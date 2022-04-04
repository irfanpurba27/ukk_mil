<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ReservasiController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware('role:admin')->get('admin/home', [App\Http\Controllers\RoomController::class, 'index'])->name('admin.home');




Route::get('guest-room', [App\Http\Controllers\TamuController::class, 'kamar'])->name('tamu.kamar');



Route::middleware('role:admin')->get('fasilitas-kamar', [App\Http\Controllers\FkamarController::class, 'index'])->name('fkamar.index');
Route::middleware('role:admin')->post('/fasilitas-kamar/create', [App\Http\Controllers\FkamarController::class, 'store'])->name('fkamar.create');
Route::middleware('role:admin')->get('/fasilitas-kamar/{fkamar}/edit', [App\Http\Controllers\FkamarController::class, 'edit'])->name('fkamar.edit');
Route::middleware('role:admin')->patch('/fasilitas-kamar/{fkamar}/edit', [App\Http\Controllers\FkamarController::class, 'update'])->name('fkamar.update');
Route::middleware('role:admin')->delete('/fasilitas-kamar/{fkamar}/delete', [App\Http\Controllers\FkamarController::class, 'destroy'])->name('fkamar.destroy');



Route::middleware('role:admin')->get('fasilitas-hotel', [App\Http\Controllers\FhotelController::class, 'index'])->name('fhotel.index');
Route::middleware('role:admin')->post('/fasilitas-hotel/create', [App\Http\Controllers\FhotelController::class, 'store'])->name('fhotel.create');
Route::middleware('role:admin')->get('/fasilitas-hotel/{fhotel}/edit', [App\Http\Controllers\FhotelController::class, 'edit'])->name('fhotel.edit');
Route::middleware('role:admin')->patch('/fasilitas-hotel/{fhotel}/edit', [App\Http\Controllers\FhotelController::class, 'update'])->name('fhotel.update');
Route::middleware('role:admin')->delete('/fasilitas-hotel/{fhotel}/delete', [App\Http\Controllers\FhotelController::class, 'destroy'])->name('fhotel.destroy');

Route::middleware('role:admin')->get('kamar', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');
Route::middleware('role:admin')->get('/kamar/{room}/edit', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
Route::middleware('role:admin')->patch('/kamar/{room}/edit', [App\Http\Controllers\RoomController::class, 'update'])->name('room.update');
Route::middleware('role:admin')->post('room/create', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
Route::middleware('role:admin')->delete('room/{room}/delete', [App\Http\Controllers\RoomController::class, 'destroy'])->name('room.destroy');
Route::middleware('role:admin')->get('/view-room/{room}', [App\Http\Controllers\FkamarController::class, 'edit'])->name('fkamar.room');
Route::middleware('role:admin')->get('/room/{room}/view', [App\Http\Controllers\RoomController::class, 'view'])->name('room.view');


Route::middleware('role:user')->get('/tamu',[ReservasiController::class,'index'])->name('tamu');
Route::middleware('role:user')->get('/tamu/kamar',[ReservasiController::class,'kamar'])->name('tamu.kamar');
Route::middleware('role:user')->get('/tamu/cetak',[ReservasiController::class,'cetak'])->name('tamu.cetak');
Route::middleware('role:user')->get('/tamu/cetak/{id}', [App\Http\Controllers\ReservasiController::class, 'cetaksatu'])->name('tamu.cetaksatu');
Route::middleware('role:user')->get('/tamu/{reservasi}/edit',[ReservasiController::class,'edit'])->name('reservasi.edit');
Route::middleware('role:resepsionis')->get('/resepsionis', [App\Http\Controllers\ReservasiController::class, 'index2'])->name('resepsionis');
Route::middleware('role:resepsionis')->delete('resepsionis/{reservasi}/delete', [App\Http\Controllers\ReservasiController::class, 'destroy'])->name('resepsionis.destroy');

Route::post('guest/create', [App\Http\Controllers\ReservasiController::class, 'store'])->name('tamu.store');

