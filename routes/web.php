<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('index',[
        "title" => "Home",
    ]);
});
Route::get('/home', function () {
     return view('index',[
        "title" => "Home",
    ]);
})->name('home');


Route::resource('data', DataController::class);

Route::prefix('action')->group(function () {
    Route::post('/data/importexcel', [DataController::class, 'importexcel'])->name('data.importexcel');
     Route::get('/data/exportexcel', [DataController::class, 'exportExcel'])->name('data.exportexcel');
     Route::get('/data/exportpdf', [DataController::class, 'exportpdf'])->name('data.exportpdf');
});








