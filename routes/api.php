<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/settings', [App\Http\Controllers\DUNGA::class, 'settings']);
Route::post('/momo', [App\Http\Controllers\DUNGA::class, 'momo']);
Route::post('/history', [App\Http\Controllers\DUNGA::class, 'history']);
Route::post('/render_minigame', [App\Http\Controllers\DUNGA::class, 'minigame']);
Route::post('/balance-hu', [App\Http\Controllers\DUNGA::class, 'hu']);
Route::post('/check-day-mission', [App\Http\Controllers\DUNGA::class, 'checkDayMission']);