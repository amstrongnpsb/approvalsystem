<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;

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

Route::get('/', [DataController::class, 'home'])->name('home')->middleware('auth');
Route::get('/home', [DataController::class, 'home'])->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::resource('data', DataController::class)->middleware('auth');
Route::prefix('action')->group(function () {
    Route::post('/data/importexcel', [DataController::class, 'importExcel'])->name('data.importexcel');
     Route::get('/data/exportexcel', [DataController::class, 'exportExcel'])->name('data.exportexcel');
     Route::get('/data/exportpdf', [DataController::class, 'exportPdf'])->name('data.exportpdf');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class)->name('user','create');
     Route::resource('user', UserController::class)->name('user','index');
     Route::get('/user/group/list', [UserController::class, 'groupList'])->name('user.group');
});









