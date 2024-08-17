<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkomodasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
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


Route::get('/umkm/detail', [UMKMController::class, 'showUMKM']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerpost'])->name('register.post');
Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');

Route::get('/dashboard_admin', [AdminController::class, 'index'])->name('dashboard_admin');