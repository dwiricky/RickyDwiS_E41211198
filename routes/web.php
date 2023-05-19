<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoatController;

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

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::get('/pages/datatables', [BoatController::class, 'index'])->name('boats.index');
Route::get('/pages/{boat}/editunit', [BoatController::class, 'edit'])->name('boats.edit');
Route::put('/pages/{boat}', [BoatController::class, 'update'])->name('boats.update');
Route::post('/pages', [BoatController::class, 'store'])->name('boats.store');

Route::delete('/boats/{boat}', [BoatController::class, 'destroy'])->name('boats.destroy');



Route::view('/pages/blank', 'pages.blank');
