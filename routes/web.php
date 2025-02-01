<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    Session::forget('register_data');
    return view('landing');
})->name('landing');


Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'getRegister')->name('getRegister');
    Route::post('/register-step1', 'registerStep1')->name('registerStep1');

    Route::get('/register-2', 'getRegister2')->name('getRegister2');
    Route::post('/register-step2', 'registerStep2')->name('registerStep2');
    Route::get('/login', 'getLogin')->name('getLogin');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/dashboard/{id}', 'dashboard')->name('dashboard');
    Route::get('/api', 'teamsAPI')->name('teamsAPI');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index'); 
    Route::get('/team/{id}', [AdminController::class, 'show'])->name('show');  
    Route::get('/team/{id}/edit', [AdminController::class, 'edit'])->name('edit');
    Route::put('/team/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/team/{id}', [AdminController::class, 'destroy'])->name('destroy');
});

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('sendEmail');
