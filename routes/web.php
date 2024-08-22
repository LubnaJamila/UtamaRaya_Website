<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkomodasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ValidasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');
});

Route::middleware(['auth', 'umkm'])->group(function () {
    Route::get('/dashboard_umkm', [UmkmController::class, 'index'])->name('dashboard_umkm');
    Route::get('/umkm/langganan', [UMKMController::class, 'paketUMKM'])->name('paketUMKM');
    Route::get('/umkm/berlangganan', [UMKMController::class, 'index_berlangganan'])->name('umkm.berlangganan');
    Route::post('/umkm/save_berlangganan', [UMKMController::class, 'save_berlangganan'])->name('save_berlangganan');
    Route::get('/umkm/detail', [UMKMController::class, 'showUMKM']);
    Route::get('/umkm/produk', [UMKMController::class, 'produk'])->name('produk');
    Route::get('/produk/create', [UMKMController::class, 'create'])->name('produk.create');
    Route::post('/produk/store',[UMKMController::class,'store'])->name('store.produk');
    Route::get('/produk/edit/{id_produk}', [UMKMController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/update/{id_produk}', [UMKMController::class, 'update'])->name('produk.update');
    Route::delete('/produk_hapus/{id_produk}', [UMKMController::class, 'hapusproduk'])->name('hapus.produk');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/umkm', [HomeController::class, 'umkm'])->name('umkm');

Route::get('/service/ballroom', [ServiceController::class, 'showBallroom']);
Route::get('/service/ballroom/detail', [ServiceController::class, 'detailBallroom']);
Route::get('/service/watersport', [ServiceController::class, 'showWaterSport']);
Route::get('/service/rental-bike', [ServiceController::class, 'showRentalBike']);

Route::get('/akomodasi/hotel', [AkomodasiController::class, 'showHotel']);
Route::get('/akomodasi/bungalauw', [AkomodasiController::class, 'showBungalauw']);
Route::get('/akomodasi/villa', [AkomodasiController::class, 'showVilla']);
Route::get('/akomodasi/cootage', [AkomodasiController::class, 'showCootage']);
Route::get('/akomodasi/detail', [AkomodasiController::class, 'detailAkomodasi']);
Route::get('/akomodasi/booking', [AkomodasiController::class, 'showStep1']);
Route::get('/akomodasi/payment', [AkomodasiController::class, 'showStep2'])->name('step2');
Route::get('/akomodasi/waiting_payment', [AkomodasiController::class, 'showStep3'])->name('step3');

Route::post('/umkm/register', [UMKMController::class, 'registerUmkm'])->name('umkm.register');

Route::get('/pengaturan/profile', [PengaturanController::class, 'profile']);
Route::get('/pengaturan/edit_profile', [PengaturanController::class, 'edit_profile_umkm'])->name('edit_profile_umkm');
Route::put('/pengaturan/edit_profile/update', [PengaturanController::class, 'update_profile_umkm'])->name('update_profile_umkm');
Route::get('/pengaturan/ubah_password', [PengaturanController::class, 'ubah_password'])->name('ubah_password');
Route::put('/pengaturan/ubah_password/update', [PengaturanController::class, 'update_password'])->name('update_password');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.form');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerpost'])->name('register.post');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');

Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');
Route::get('/validasi', [AdminController::class, 'validasi'])->name('validasi');
Route::get('/master/akomodasi', [AdminController::class, 'akomodasi'])->name('penginapan');
Route::get('/master/watersport', [AdminController::class, 'watersport'])->name('watersport');
Route::get('/master/rental_bike', [AdminController::class, 'rental'])->name('rentalbike');
Route::get('/master/wedding_ballroom', [AdminController::class, 'ballroom'])->name('wedding');
//penginapan
Route::get('/akomodasi/create', [AdminController::class, 'create'])->name('akomodasi.create');
Route::post('/akomodasi_store', [AdminController::class, 'store_penginapan'])->name('store.penginapan');
Route::get('/akomodasi/edit/{id_tipe_kamar}', [AdminController::class, 'edit'])->name('akomodasi.edit');
Route::put('/akomodasi_update/{id_tipe_kamar}', [AdminController::class, 'updatepenginapan'])->name('update.penginapan');
Route::delete('/akomodasi_hapus/{id_tipe_kamar}', [AdminController::class, 'hapuspenginapan'])->name('hapus.penginapan');
//rentalbike
Route::get('/rental-bike/create', [AdminController::class, 'createrental'])->name('rental.create');
Route::post('/rental-bike/store',[AdminController::class,'store_rentalbike'])->name('store.rentalbike');
Route::get('/rental-bike/edit/{id_rentalbike}', [AdminController::class, 'editrental'])->name('rental.edit');
Route::put('/rental-bike/update/{id_rentalbike}', [AdminController::class, 'updaterental'])->name('rental.update');
Route::delete('rental-bike/delete/{id_rentalbike}',[AdminController::class,'hapusrental'])->name('hapusrental');
//water sport
Route::get('/watersport/create', [AdminController::class, 'createwater'])->name('water.create');
Route::post('/watersport/store',[AdminController::class,'store'])->name('store.water');
Route::get('/watersport/edit/{id_watersport}', [AdminController::class, 'editwater'])->name('water.edit');
Route::put('/watersport/update/{id_watersport}', [AdminController::class, 'updatewater'])->name('water.update');
Route::delete('watersport/delete/{id_watersport}',[AdminController::class,'hapuswater'])->name('hapuswater');
//wedding
Route::get('/ballroom-wedding/create', [AdminController::class, 'createballroom'])->name('ballroom.create');
Route::post('/ballroom-wedding/store',[AdminController::class,'storewedding'])->name('store.wedding');
Route::get('/ballroom-wedding/edit/{id_wedding}', [AdminController::class, 'editballroom'])->name('ballroom.edit');
Route::put('/ballroom-wedding/update/{id_wedding}', [AdminController::class, 'updatewedding'])->name('wedding.update');
Route::delete('/ballroom-wedding/delete/{id_wedding}',[AdminController::class,'hapuswedding'])->name('hapuswedding');
//rekening
Route::get('/master/rekening', [AdminController::class, 'rekening'])->name('rekening');
Route::get('/rekening/create', [AdminController::class, 'index_rekening'])->name('rekening.create');
Route::post('/get-bank-details', [AdminController::class, 'getBankDetails'])->name('get.bank.details');
Route::post('/rekening_store', [AdminController::class, 'store_rekening'])->name('store.rekening');
Route::delete('/rekening_hapus/{id_rek}', [AdminController::class, 'hapusrekening'])->name('hapus.rekening');


Route::get('/validasi/pembatalan', [ValidasiController::class, 'pembatalan']);
Route::get('/validasi/pembayaran', [ValidasiController::class, 'pembayaran']);
Route::get('/validasi/umkm', [ValidasiController::class, 'umkm']);

Route::get('/pengaturan', [UserController::class, 'pengaturan']);
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('/pembatalan', [UserController::class, 'pembatalan'])->name('pembatalan');Route::get('/pengaturan/profile', [PengaturanController::class, 'profile']);
Route::get('/pengaturan/edit', [UserController::class, 'edit_profile']);
Route::put('/pengaturan/edit/update', [UserController::class, 'update_profile'])->name('update_profile');