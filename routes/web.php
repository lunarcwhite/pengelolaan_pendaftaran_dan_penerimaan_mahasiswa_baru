<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index']);

Route::get('/pendaftaran', [LandingController::class, 'daftar']);
Route::get('/ceklulus', [LandingController::class, 'cek'])->name('cekLulus');
Route::get('/skl/{id}', [LandingController::class, 'cetak'])->name('cetak');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'authenticate');
    Route::post('/logout', 'logout')->middleware('auth');
});
Route::middleware(['guest'])->group(function () {
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/forgot-password', 'forgotPasswordForm')->name('password.request');
        Route::post('/forgot-password', 'prosesForgot')->name('password.email');
        Route::get('/reset-password/{token}', 'passwordReset')->name('password.reset');
        Route::post('/reset-password', 'newPassword')->name('password.update');
    });
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'create');
});

Route::controller(DashboardController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'index');
    Route::post('/dashboard/input-form-registrasi', 'create');
    Route::put('/dashboard/edit-form-registrasi', 'update');
    Route::get('/dashboard/lihat/{no_reg}', 'show')->name('admin.show')->middleware('admin');
});
Route::controller(SeleksiController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard/seleksi', 'index');
    Route::get('/dashboard/send-mail', 'email')->middleware('admin')->name('emails.Pemberitahuan');
    Route::get('/dashboard/send-email/pengingat', 'emailPengingat')->middleware('admin')->name('emailPengingat');
    Route::get('/dashboard/pendaftar/export', 'export')->name('export.excel')->middleware('admin');
    Route::post('/admin/fungsi-seleksi', 'seleksi')->middleware('admin');
    Route::get('/dashboard/pdf', 'print_pdf')->name('dashboard.pdf')->middleware('admin');
    Route::patch('/dashboard/nonaktif', 'nonaktif');
});

Route::controller(SoalController::class)->group(function () {
    Route::post('/admin/soal/import', 'import')->middleware(['admin','auth']);
    Route::get('/dashboard/soal/', 'index')->middleware(['admin','auth']);
    Route::get('/dashboard/soal/tinjau', 'tinjau')->middleware(['admin','auth']);
    Route::get('/dashboard/soal/{no_reg}', 'show')->middleware(['pendaftar', 'soal', 'revalidate']);
    Route::post('/dashboard/soal', 'submit')->name('soal.submit')->middleware('pendaftar');
    Route::post('/admin/nilai/import', 'importNilai')->middleware(['admin','auth']);
    Route::post('/admin/hapus/soal', 'hapusSoal')->name('hapus.soal')->middleware(['admin','auth']);
});

Route::middleware(['admin','auth'])->group(function () {
    Route::controller(FakultasController::class)->group(function () {
        Route::get('/dashboard/fakultas', 'index')->name('admin.fakultas');
        Route::get('/dashboard/fakultas/{kode_fakultas}', 'show');
        Route::get('/dashboard/fakultas/{kode_fakultas}/{kode_jurusan}', 'pendaftar');
    });
});
Route::middleware(['admin','auth'])->group(function () {
    Route::controller(SettingController::class)->group(function () {
        Route::get('/dashboard/setting', 'index')->name('admin.setting');
        Route::get('/dashboard/setting/{id}', 'edit')->name('admin.setting.edit');
        Route::patch('/dashboard/setting/update', 'update')->name('admin.setting.update');
        Route::patch('/admin/waktu_ujian/setting', 'waktu_ujian')->name('waktu_ujian');
    });
});

