<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\RekPembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NoKamar;
use App\Models\TipeKamar;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function getBankDetails(Request $request)
    {
        $accountNumber = $request->input('accountNumber');
        $bankCode = $request->input('bank');

        $url = "https://api-rekening.lfourr.com/getBankAccount";
        $response = Http::get($url, [
            'bankCode' => $bankCode,
            'accountNumber' => $accountNumber,
        ]);

        // Log the entire response for debugging
        Log::info('API Response:', ['response' => $response->body()]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['data']) && isset($data['data']['bankname']) && isset($data['data']['accountname'])) {
                return response()->json([
                    'bankName' => $data['data']['bankname'],
                    'accountHolder' => $data['data']['accountname'],
                ]);
            } else {
                return response()->json(['error' => 'Data tidak lengkap dari API'], 500);
            }
        } else {
            return response()->json(['error' => 'Gagal mengambil detail rekening'], 500);
        }
    }
    public function showForm(Request $request)
    {
        $selectedRoomId = $request->input('selected_room');
        $selectedRoom = NoKamar::find($selectedRoomId);

        $rekPembayaran = RekPembayaran::all();

        return view('frontend.akomodasi.step3', compact('request', 'selectedRoom', 'rekPembayaran'));
    }
    public function store(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'id_rek' => 'required',
            'bukti_tf' => 'required|file|mimes:jpg,jpeg,png,pdf',
        ]);

        
        // Simpan data booking ke database
        $booking = new Booking();
        $booking->tanggal_checkin = $request->tanggal_checkin;
        $booking->tanggal_checkout = $request->tanggal_checkout;
        $booking->total_harga = $request->total_harga;
        $booking->min_dp = $request->min_dp; // 50% DP
        $booking->status_booking = 'pengajuan_booking'; // Atur status default jika perlu
        $booking->id_user = $request->id_user;

        $bookingFolder = public_path('uploads');
        if (!file_exists($bookingFolder)) {
            mkdir($bookingFolder, 0777, true);
        }

        // Simpan file upload untuk event
        if ($request->hasFile('bukti_tf')) {
            $file = $request->file('bukti_tf');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($bookingFolder, $fileName);
            $booking->bukti_tf = 'uploads/' . $fileName;
        }
        $booking->id_no_kamar = $request->id_no_kamar;
        $booking->id_rek = $request->id_rek;
        $booking->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('dashboard')->with('message','Booking berhasil dilakukan!');
    }
    public function showCancellationForm($id_booking)
    {
        $booking = Booking::findOrFail($id_booking);
        // Membuat permintaan ke API listBank
        $response = Http::get('https://api-rekening.lfourr.com/listBank');

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            // Mendapatkan data daftar bank dari respons JSON
            $responseData = $response->json();

            // Memeriksa apakah respons berisi data bank
            if (isset($responseData['data'])) {
                $banks = $responseData['data']; // Mengambil data bank dari kunci 'data'

                // Mengirimkan data ke view
                return view('backend.user.pembatalan_form', compact('booking', 'banks'));
            } else {
                return back()->withErrors('Data bank tidak tersedia dalam respons');
            }
        } else {
            // Jika permintaan gagal, tindakan yang sesuai (misalnya menampilkan pesan kesalahan)
            return back()->withErrors('Gagal mengambil daftar bank');
        }

    }

    public function cancelBooking(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_booking' => 'required|exists:booking,id_booking', // Validasi ID booking
            'alasan' => 'required|string|max:255',
            'bank' => 'required|string',
            'accountNumber' => 'required|string',
            'accountHolder' => 'required|string'
        ]);

        // Cari booking berdasarkan ID
        $booking = Booking::find($request->id_booking);

        if ($booking) {
            // Update data booking
            $booking->status_booking = 'pengajuan_pembatalan';
            $booking->alasan_pengembalian = $request->alasan;
            $booking->no_rek_tamu = $request->accountNumber;
            $booking->nama_pemilik_tamu = $request->accountHolder;
            $booking->nama_bank_tamu = $request->nama_bank;
            $booking->update();

            return redirect()->route('dashboard')->with('message', 'Booking berhasil dibatalkan.');
        } else {
            return redirect()->back()->with('error', 'Booking tidak ditemukan.');
        }
    }
    public function showRescheduleForm($id)
    {
        $booking = Booking::with('NoKamar.Penginapan')->findOrFail($id);

        return view('backend.user.reschedule1', [
            'booking' => $booking,
            'noKamarId' => $booking->id_no_kamar,
            'tipeKamarId' => $booking->NoKamar->id_tipe_kamar ?? null,
        ]);
    }

    public function processReschedule(Request $request)
    {
        $request->validate([
            'id_booking' => 'required|exists:booking,id_booking',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        try {
           // Ambil data booking dan relasinya
        $booking = Booking::with('NoKamar.Penginapan')->findOrFail($request->id_booking);

        // Ambil data dari relasi
        $noKamarId = $booking->NoKamar->id_no_kamar;
        $tipeKamarId = $booking->NoKamar->Penginapan->id_tipe_kamar;

        // Cek ketersediaan kamar
        $availableRooms = $this->getAvailableRooms($tipeKamarId, $request->check_in_date, $request->check_out_date);

        // Hitung total harga
        $roomType = Penginapan::findOrFail($tipeKamarId);
        $totalPrice = $this->calculateTotalPrice($roomType, $request->check_in_date, $request->check_out_date);

            return response()->json([
                'availableRooms' => $availableRooms,
                'totalPrice' => number_format($totalPrice, 0, ',', '.'),
            ]);

        } catch (\Exception $e) {
            // Kirimkan pesan error ke client
            return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    private function getAvailableRooms($roomTypeId, $checkInDate, $checkOutDate)
    {
        return NoKamar::where('id_tipe_kamar', $roomTypeId)
            ->whereNotIn('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                $query->select('id_no_kamar')
                    ->from('booking')
                    ->where(function ($query) use ($checkInDate, $checkOutDate) {
                        $query->whereBetween('tanggal_checkin', [$checkInDate, $checkOutDate])
                            ->orWhereBetween('tanggal_checkout', [$checkInDate, $checkOutDate])
                            ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                                $query->where('tanggal_checkin', '<', $checkOutDate)
                                    ->where('tanggal_checkout', '>', $checkInDate);
                            });
                    });
            })
            ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where('id_no_kamar', function ($query) use ($checkInDate, $checkOutDate) {
                    $query->select('id_no_kamar')
                        ->from('booking')
                        ->whereIn('status_booking', ['pengajuan_pembatalan', 'dibatalkan', 'check out'])
                        ->whereBetween('tanggal_checkin', [$checkInDate, $checkOutDate])
                        ->orWhereBetween('tanggal_checkout', [$checkInDate, $checkOutDate]);
                });
            })
            ->get(['id_no_kamar', 'no_kamar']);
    }

    private function calculateTotalPrice($roomType, $checkInDate, $checkOutDate)
    {
        $totalPrice = 0;
        $currentDate = Carbon::parse($checkInDate);
        $checkOutDate = Carbon::parse($checkOutDate);

        while ($currentDate->lessThan($checkOutDate)) {
            $dayOfWeek = $currentDate->dayOfWeek;
            $isWeekend = ($dayOfWeek == Carbon::FRIDAY || $dayOfWeek == Carbon::SATURDAY);
            $pricePerDay = $isWeekend ? $roomType->harga_weekend : $roomType->harga_weekdays;
            $totalPrice += $pricePerDay;
            $currentDate->addDay();
        }

        return $totalPrice;
    }
}