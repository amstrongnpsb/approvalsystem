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

Route::get('data', [DataController::class, 'index'])->middleware(['auth', 'can:view data']);
Route::get('datatable', [DataController::class, 'dataTable'])->name('datatable')->middleware(['auth', 'can:view data']);
Route::middleware(['auth', 'role:project-admin'])->group(function () {
    Route::prefix('data')->group(function () {
        Route::post('/importexcel', [DataController::class, 'importExcel'])->name('importexcel');
        Route::get('/exportexcel', [DataController::class, 'exportExcel'])->name('exportexcel');
        Route::get('/exportpdf/{id}', [DataController::class, 'exportPdf'])->name('exportpdf');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('user', UserController::class)->names('user');
    Route::get('/user/group/list', [UserController::class, 'groupList'])->name('user.group');
});










