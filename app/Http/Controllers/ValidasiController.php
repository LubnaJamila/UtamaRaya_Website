<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
     public function pembatalan()
     {
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'pengajuan_pembatalan')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanPembatalan = Booking::where('status_booking', 'pengajuan_pembatalan')->count();
          $jumlahDibatalkan = Booking::where('status_booking', 'dibatalkan')->count();

          // Kirim data ke view
          return view('backend.admin.validasi.pembatalan', [
               'bookings' => $bookings,
               'jumlahPengajuanPembatalan' => $jumlahPengajuanPembatalan,
               'jumlahDibatalkan' => $jumlahDibatalkan,
          ]);
     }
     public function dibatalkan()
     {
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'dibatalkan')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanPembatalan = Booking::where('status_booking', 'pengajuan_pembatalan')->count();
          $jumlahDibatalkan = Booking::where('status_booking', 'dibatalkan')->count();

          // Kirim data ke view
          return view('backend.admin.validasi.dibatalkan', [
               'bookings' => $bookings,
               'jumlahPengajuanPembatalan' => $jumlahPengajuanPembatalan,
               'jumlahDibatalkan' => $jumlahDibatalkan,
          ]);
     }

     public function pengembalian($id)
     {
          // Cari booking berdasarkan ID
          $booking = Booking::findOrFail($id);

          // Tampilkan halaman upload dengan data booking
          return view('backend.admin.validasi.pengembalian', [
               'booking' => $booking
          ]);
     }

     public function uploadBuktiPengembalian(Request $request)
     {
          // Validasi form
          $request->validate([
               'id_booking' => 'required|exists:booking,id_booking',
               'proof_image' => 'required', // Validasi gambar
          ]);
          // Cari booking berdasarkan ID
          $booking = Booking::findOrFail($request->id_booking);

          // Tentukan folder penyimpanan
          $bookingFolder = public_path('uploads/pengembalian');
          if (!file_exists($bookingFolder)) {
               mkdir($bookingFolder, 0777, true); // Buat folder jika belum ada
          }

          // Simpan file upload
          if ($request->hasFile('proof_image')) {
               $file = $request->file('proof_image');
               $fileName = time() . '_' . $file->getClientOriginalName();
               $file->move($bookingFolder, $fileName);
               $booking->bukti_pengembalian = 'uploads/pengembalian/' . $fileName;
          }

          // Update status booking menjadi "dibatalkan"
          $booking->status_booking = 'dibatalkan';
          $booking->save();

          // Redirect kembali ke halaman pembayaran dengan pesan sukses
          return redirect()->route('pembatalan')->with('success', 'Status booking berhasil diperbarui dan bukti pengembalian telah diunggah.');
     }
     public function pembayaran()
     {
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'pengajuan_booking')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          // Kirim data ke view
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
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'booking')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          // Kirim data ke view
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
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'checkin')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          // Kirim data ke view
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
          // Ambil data booking dengan relasi user, nomor kamar, dan tipe kamar
          $bookings = Booking::with(['User', 'noKamar.Penginapan'])
               ->where('status_booking', 'checkout')
               ->get();

          // Hitung jumlah booking dengan status "pengajuan booking"
          $jumlahPengajuanBooking = Booking::where('status_booking', 'pengajuan_booking')->count();
          $jumlahBooking = Booking::where('status_booking', 'booking')->count();
          $jumlahCheckin = Booking::where('status_booking', 'checkin')->count();
          $jumlahCheckout = Booking::where('status_booking', 'checkout')->count();

          // Kirim data ke view
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
          // Cari booking berdasarkan ID
          $booking = Booking::findOrFail($id);

          // Update status booking menjadi "booking"
          $booking->status_booking = 'booking';

          // Simpan perubahan
          $booking->save();

          // Redirect ke halaman pembayaran dengan pesan sukses
          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function checkin(Request $request, $id)
     {
          // Cari booking berdasarkan ID
          $booking = Booking::findOrFail($id);

          // Update status booking menjadi "booking"
          $booking->status_booking = 'checkin';

          // Simpan perubahan
          $booking->save();

          // Redirect ke halaman pembayaran dengan pesan sukses
          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function checkout(Request $request, $id)
     {
          // Cari booking berdasarkan ID
          $booking = Booking::findOrFail($id);

          // Update status booking menjadi "booking"
          $booking->status_booking = 'checkout';

          // Simpan perubahan
          $booking->save();

          // Redirect ke halaman pembayaran dengan pesan sukses
          return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
     }
     public function umkm()
     {
          return view('backend.admin.validasi.umkm');
     }

}