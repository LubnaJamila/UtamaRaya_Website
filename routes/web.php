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

Route::get('/umkm/langganan', [UMKMController::class, 'paketUMKM']);
Route::get('/umkm/detail', [UMKMController::class, 'showUMKM']);
Route::post('/umkm/register', [UMKMController::class, 'registerUmkm'])->name('umkm.register');
Route::get('/umkm/dashboard_umkm', [UMKMController::class, 'index']);
Route::get('/umkm/produk', [UMKMController::class, 'produk']);
Route::get('/produk/create', [UMKMController::class, 'create'])->name('produk.create');
Route::get('/produk/edit', [UMKMController::class, 'edit'])->name('produk.edit');

Route::get('/pengaturan/profile', [PengaturanController::class, 'profile']);
Route::get('/pengaturan/edit_profile', [PengaturanController::class, 'edit_profile']);
Route::put('/pengaturan/edit_profile/update', [PengaturanController::class, 'update_profile'])->name('update_profile');
Route::get('/pengaturan/ubah_password', [PengaturanController::class, 'ubah_password'])->name('ubah_password');
Route::put('/pengaturan/ubah_password/update', [PengaturanController::class, 'update_password'])->name('update_password');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerpost'])->name('register.post');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');

Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');
Route::get('/validasi', [AdminController::class, 'validasi'])->name('validasi');
Route::get('/master/akomodasi', [AdminController::class, 'akomodasi']);
Route::get('/master/watersport', [AdminController::class, 'watersport']);
Route::get('/master/rental_bike', [AdminController::class, 'rental']);
Route::get('/master/wedding_ballroom', [AdminController::class, 'ballroom']);
Route::get('/akomodasi/create', [AdminController::class, 'create'])->name('akomodasi.create');
Route::put('/akomodasi/edit', [AdminController::class, 'edit'])->name('akomodasi.edit');
Route::get('/rental-bike/create', [AdminController::class, 'createrental'])->name('rental.create');
Route::put('/rental-bike/edit', [AdminController::class, 'editrental'])->name('rental.edit');
Route::get('/watersport/create', [AdminController::class, 'createwater'])->name('water.create');
Route::put('/watersport/edit', [AdminController::class, 'editwater'])->name('water.edit');
Route::get('/ballroom-wedding/create', [AdminController::class, 'createballroom'])->name('ballroom.create');
Route::put('/ballroom-wedding/edit', [AdminController::class, 'editballroom'])->name('ballroom.edit');

Route::get('/validasi/rekening', [ValidasiController::class, 'rekening']);
Route::get('/rekening/create', [ValidasiController::class, 'createrekening'])->name('rekening.create');
Route::put('/rekening/edit', [ValidasiController::class, 'editrekening'])->name('rekening.edit');
Route::get('/validasi/pembatalan', [ValidasiController::class, 'pembatalan']);
Route::get('/validasi/pembayaran', [ValidasiController::class, 'pembayaran']);
Route::get('/validasi/umkm', [ValidasiController::class, 'umkm']);

Route::get('/pengaturan', [UserController::class, 'pengaturan']);
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('/pembatalan', [UserController::class, 'pembatalan'])->name('pembatalan');Route::get('/pengaturan/profile', [PengaturanController::class, 'profile']);
Route::get('/pengaturan/edit', [UserController::class, 'edit_profile']);
Route::put('/pengaturan/edit/update', [UserController::class, 'update_profile'])->name('update_profile');