<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'admin.'], function () {
    Route::get('/home', [App\Http\Controllers\dgaAdmin\HomeController::class, 'home'])->name('home');
    Route::get('/setting', [App\Http\Controllers\dgaAdmin\HomeController::class, 'setting'])->name('setting');
    Route::post('/setting', [App\Http\Controllers\dgaAdmin\HomeController::class, 'settingEdit'])->name('settingEdit');
    Route::get('/add-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'addMomo'])->name('addMomo');
    Route::post('/get-otp', [App\Http\Controllers\dgaAdmin\MomoController::class, 'getOTP'])->name('getOTP');
    Route::post('/verify-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'verifyMomo'])->name('verifyMomo');
    Route::get('/login-momo/{phone}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'loginMomo'])->name('loginMomo');
    Route::get('/history-momo/{phone}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'historyMomo'])->name('historyMomo');
    Route::get('/check-momo/{phone}/{receiver}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'checkMomo'])->name('checkMomo');
    Route::get('/send-money-momo/{phone}/{amount}/{comment}/{receiver}', [App\Http\Controllers\dgaAdmin\MomoController::class, 'sendMoneyMomo'])->name('sendMoneyMomo');
    Route::get('/xu-ly-minigame', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'XuLiMiniGame'])->name('XuLiMiniGame');
    Route::get('/xu-ly-pay', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payMoneyMiniGame'])->name('payMoneyMiniGame');
    Route::get('/xu-ly-day-mission', [App\Http\Controllers\dgaAdmin\MiniGame::class, 'payDayMission'])->name('payMoneyMiniGame');
    Route::post('/delete-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'deleteMomo'])->name('deleteMomo');
    Route::post('/active-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'activeMomo'])->name('activeMomo');
    Route::post('/hide-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'hideMomo'])->name('hideMomo');
    Route::post('/maintenance-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'maintenanceMomo'])->name('maintenanceMomo');
    Route::post('/info-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'infoMomo'])->name('infoMomo');
    Route::post('/edit-momo', [App\Http\Controllers\dgaAdmin\MomoController::class, 'editMomo'])->name('editMomo');
    Route::get('/history-play/{game}', [App\Http\Controllers\dgaAdmin\HistoryController::class, 'historyPlay'])->name('historyPlay');
});
