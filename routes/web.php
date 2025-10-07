<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TwoFactorLoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//SILVESTER SEBASTIAN GERANA

Route::get('/',[LoginController::class, 'index'])->name('index');

Route::view('/forgot-password','auth.forgot-password')->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'passwordEmail']);
Route::get('/reset-password/{token}',[ResetPasswordController::class, 'passwordReset'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class,'passwordUpdate'])->name('password.update');

Route::get('/login',[LoginController::class, 'showLoginPage'])->name('login')->middleware('guest');
Route::post('/loginLogic', [LoginController::class, 'loginLogic'])->name('loginLogic');
Route::get('/admin-pegawai/{id}', [LoginController::class, 'show']);

Route::middleware(['auth', 'twoFactor'])->group(function(){
    Route::get('/admin-dashboard',[LoginController::class, 'showAD'])->name('showAD');
    Route::get('/admin-management',[LoginController::class, 'showAM'])->name('showAM');
    Route::get('/admin-user',[LoginController::class, 'showAU'])->name('showAU');
    Route::get('/admin-pegawai',[LoginController::class, 'showAP'])->name('showAP');
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

    Route::post('/admin-pegawai', [KaryawanController::class, 'store'])->name('pegawai.store');
    Route::delete('/admin-pegawai/{id}',[KaryawanController::class,'destroy'])->name('pegawai.destroy');
    Route::post('/admin-pegawai-edit/{id}', [KaryawanController::class, 'update'])->name('pegawai.update');
    Route::get('/admin-pegawai/{id}', [KaryawanController::class, 'edit'])->name('pegawai.edit');

    Route::post('/admin-management', [StrukturController::class, 'store'])->name('struktur.store');
    Route::delete('/admin-management/{id}',[StrukturController::class,'destroy'])->name('struktur.destroy');
    Route::post('/admin-management-edit/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/admin-management/{id}', [StrukturController::class, 'edit'])->name('struktur.edit');

    Route::post('/admin-management', [StrukturController::class, 'store'])->name('struktur.store');
    Route::delete('/admin-management/{id}',[StrukturController::class,'destroy'])->name('struktur.destroy');
    Route::post('/admin-management-edit/{id}', [StrukturController::class, 'update'])->name('struktur.update');
    Route::get('/admin-management/{id}', [StrukturController::class, 'edit'])->name('struktur.edit');

    Route::post('/admin-user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/admin-user/{id}',[UserController::class,'destroy'])->name('user.destroy');
    Route::post('/admin-user-edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/admin-user/{id}', [UserController::class, 'edit'])->name('user.edit');


});

Route::middleware(['auth'])->group(function(){
    Route::get('/two-factor-login', [TwoFactorLoginController::class, 'index'])->name('two-factor-login.index');
    Route::post('/two-factor-login', [TwoFactorLoginController::class, 'verify'])->name('two-factor-login.verify');
    Route::get('/two-factor-login/resend', [TwoFactorLoginController::class, 'resend'])->name('two-factor-login.resend');
});

Route::prefix('Layanan')->group(function () {
    Route::get('/layanan_ioan', [LayananController::class, 'layanan_ioan'])->name('layanan_ioan');
    Route::get('/layanan_maintenance', [LayananController::class, 'layanan_maintenance'])->name('layanan_maintenance');
    Route::get('/layanan_project', [LayananController::class, 'layanan_project'])->name('layanan_project');
    Route::get('/layanan_provi', [LayananController::class, 'layanan_provi'])->name('layanan_provi');
});

Route::prefix('Perusahaan')->group(function () {
    Route::get('/profilPerusahaan', [PerusahaanController::class, 'profilPerusahaan'])->name('profilPerusahaan');
    Route::get('/struktur_perusahaan',[PerusahaanController::class, 'showStruktur'])->name('showStruktur');
    Route::get('/contact_us', [PerusahaanController::class, 'contactUs'])->name('contactUs');

});




