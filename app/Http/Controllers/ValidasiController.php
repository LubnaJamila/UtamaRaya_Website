<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\langganan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ValidasiController extends Controller
{
     public function pembatalan()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'pengajuan_pembatalan')
               ->get();

          $jumlahPengajuanPembatalan = Booking::where('status_booking', 'pengajuan_pembatalan')->count();
          $jumlahDibatalkan = Booking::where('status_booking', 'dibatalkan')->count();

          return view('backend.admin.validasi.pembatalan', [
               'bookings' => $bookings,
               'jumlahPengajuanPembatalan' => $jumlahPengajuanPembatalan,
               'jumlahDibatalkan' => $jumlahDibatalkan,
          ]);
     }
     public function dibatalkan()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'dibatalkan')
               ->get();

          $jumlahPengajuanPembatalan = Booking::where('status_booking', 'pengajuan_pembatalan')->count();
          $jumlahDibatalkan = Booking::where('status_booking', 'dibatalkan')->count();

          return view('backend.admin.validasi.dibatalkan', [
               'bookings' => $bookings,
               'jumlahPengajuanPembatalan' => $jumlahPengajuanPembatalan,
               'jumlahDibatalkan' => $jumlahDibatalkan,
          ]);
     }

     public function pengembalian($id)
     {
          $booking = Booking::findOrFail($id);
          
          return view('backend.admin.validasi.pengembalian', [
               'booking' => $booking
          ]);
     }

     public function uploadBuktiPengembalian(Request $request)
     {
          $request->validate([
               'id_booking' => 'required|exists:booking,id_booking',
               'proof_image' => 'required',
          ]);
          $booking = Booking::findOrFail($request->id_booking);

          $bookingFolder = public_path('uploads/pengembalian');
          if (!file_exists($bookingFolder)) {
               mkdir($bookingFolder, 0777, true); 
          }

          if ($request->hasFile('proof_image')) {
               $file = $request->file('proof_image');
               $fileName = time() . '_' . $file->getClientOriginalName();
               $file->move($bookingFolder, $fileName);
               $booking->bukti_pengembalian = 'uploads/pengembalian/' . $fileName;
          }

          $booking->status_booking = 'dibatalkan';
          $booking->save();

          return redirect()->route('pembatalan')->with('success', 'Status booking berhasil diperbarui dan bukti pengembalian telah diunggah.');
     }
     public function pembayaran()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'pengajuan_booking')
               ->get();

          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          return view('backend.admin.validasi.pembayaran', [
               'bookings' => $bookings,
               'jumlahPengajuanBooking' => $jumlahPengajuanBooking,
               'jumlahBooking' => $jumlahBooking,
               'jumlahCheckin' => $jumlahCheckin,
               'jumlahCheckout' => $jumlahCheckout,
          ]);
     }
     public function pembayaranBooking()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'booking')
               ->get();
               
          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          return view('backend.admin.validasi.booking', [
               'bookings' => $bookings,
               'jumlahPengajuanBooking' => $jumlahPengajuanBooking,
               'jumlahBooking' => $jumlahBooking,
               'jumlahCheckin' => $jumlahCheckin,
               'jumlahCheckout' => $jumlahCheckout,
          ]);
     }
     public function pembayaranCheckin()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'checkin')
               ->get();

          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          return view('backend.admin.validasi.checkin', [
               'bookings' => $bookings,
               'jumlahPengajuanBooking' => $jumlahPengajuanBooking,
               'jumlahBooking' => $jumlahBooking,
               'jumlahCheckin' => $jumlahCheckin,
               'jumlahCheckout' => $jumlahCheckout,
          ]);
     }
     public function pembayaranCheckout()
     {
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'checkout')
               ->get();

          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();
          
          return view('backend.admin.validasi.checkout', [
               'bookings' => $bookings,
               'jumlahPengajuanBooking' => $jumlahPengajuanBooking,
               'jumlahBooking' => $jumlahBooking,
               'jumlahCheckin' => $jumlahCheckin,
               'jumlahCheckout' => $jumlahCheckout,
          ]);
     }
     public function updateStatus(Request $request, $id)
     {
          $booking = Booking::findOrFail($id);
          $booking->status_booking = 'booking';
          $booking->save();

          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function checkin(Request $request, $id)
     {

          $booking = Booking::findOrFail($id);
          $booking->status_booking = 'checkin';
          $booking->save();

          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function checkout(Request $request, $id)
     {

          $booking = Booking::findOrFail($id);
          $booking->status_booking = 'checkout';
          $booking->save();

          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function umkm()
     {
          $langganan = langganan::with(['User'])
               ->where('status_langganan', 'menunggu verifikasi')
               ->get();

          $jumlahMenunggu = langganan::where('status_langganan', 'menunggu verifikasi')->count();
          $jumlahAktif = langganan::where('status_langganan', 'aktif')->count();
          $jumlahNonAktif = langganan::where('status_langganan', 'nonaktif')->count();

          return view('backend.admin.validasi.umkm', [
               'langganan' => $langganan,
               'jumlahMenunggu' => $jumlahMenunggu,
               'jumlahAktif' => $jumlahAktif,
               'jumlahNonAktif' => $jumlahNonAktif,
          ]);
     }
     public function umkmAktif()
     {
          $langganan = langganan::with(['User'])
               ->where('status_langganan', 'aktif')
               ->get();

          $jumlahMenunggu = langganan::where('status_langganan', 'menunggu verifikasi')->count();
          $jumlahAktif = langganan::where('status_langganan', 'aktif')->count();
          $jumlahNonAktif = langganan::where('status_langganan', 'nonaktif')->count();

          return view('backend.admin.validasi.aktif', [
               'langganan' => $langganan,
               'jumlahMenunggu' => $jumlahMenunggu,
               'jumlahAktif' => $jumlahAktif,
               'jumlahNonAktif' => $jumlahNonAktif,
          ]);
     }
     public function umkmNonaktif()
     {
          $langganan = langganan::with(['User'])
               ->where('status_langganan', 'nonaktif')
               ->get();

          $jumlahMenunggu = langganan::where('status_langganan', 'menunggu verifikasi')->count();
          $jumlahAktif = langganan::where('status_langganan', 'aktif')->count();
          $jumlahNonAktif = langganan::where('status_langganan', 'nonaktif')->count();

          return view('backend.admin.validasi.nonaktif', [
               'langganan' => $langganan,
               'jumlahMenunggu' => $jumlahMenunggu,
               'jumlahAktif' => $jumlahAktif,
               'jumlahNonAktif' => $jumlahNonAktif,
          ]);
     }
     public function validasiLangganan($id_langganan)
    {
        $langganan = langganan::findOrFail($id_langganan);
        $langganan->status_langganan = 'aktif';
        $tanggalMulai = Carbon::now();
        $tanggalBerakhir = $tanggalMulai->copy()->addDays(30);
        $langganan->tanggal_mulai = $tanggalMulai;
        $langganan->tanggal_berakhir = $tanggalBerakhir;
        $langganan->save();

        return redirect()->route('validasi.umkm')->with('success', 'Langganan berhasil divalidasi dan diaktifkan.');
    }
    public function validasiNonAktif($id_langganan)
    {
        $langganan = langganan::findOrFail($id_langganan);
        $langganan->status_langganan = 'nonaktif';
        $langganan->save();

        return redirect()->route('validasi.umkm_aktif')->with('success', 'Langganan berhasil divalidasi dan dinonaktifkan.');
    }
}