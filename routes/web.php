<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

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

Route::get('/', [DataController::class, 'home'])->name('home');
Route::get('/home', [DataController::class, 'home']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::resource('data', DataController::class)->middleware('auth');
Route::prefix('action')->group(function () {
    Route::post('/data/importexcel', [DataController::class, 'importexcel'])->name('data.importexcel');
     Route::get('/data/exportexcel', [DataController::class, 'exportExcel'])->name('data.exportexcel');
     Route::get('/data/exportpdf', [DataController::class, 'exportpdf'])->name('data.exportpdf');
})->middleware('auth');









