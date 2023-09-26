<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaiterController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin
Route::middleware('auth')->group(function () {

    Route::get('/admin/meja', [AdminController::class, 'indexMeja'])->name('admin.meja');
    Route::post('/admin/tambahmeja', [AdminController::class, 'storeMeja'])->name('admin.tambahMeja');
    //Route::get('/admin/ubahmeja/{id}', [AdminController::class, 'ubahMeja'])->name('admin.ubahMeja');
    //Route::put('/admin/editmeja/{id}', [AdminController::class, 'editMeja'])->name('admin.editMeja');
    Route::post('/admin/hapusmeja', [AdminController::class, 'hapusMeja'])->name('admin.hapusMeja');


    Route::get('/admin/menu', [AdminController::class, 'indexMenu'])->name('admin.menu');
    Route::post('/admin/tambahMenu', [AdminController::class, 'storeMenu'])->name('admin.tambahMenu');
    Route::get('/admin/ubahmenu/{id}', [AdminController::class, 'ubahMenu'])->name('admin.ubahMenu');
    Route::put('/admin/editmenu/{id}', [AdminController::class, 'editMenu'])->name('admin.editMenu');
    Route::delete('/admin/hapusmenu/{id}', [AdminController::class, 'hapusMenu'])->name('admin.hapusMenu');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/waiter', [WaiterController::class, 'index'])->name('waiter.index');
    Route::get('/kategori/{kategori}', [WaiterController::class, 'show'])->name('kategori.show');
});

//kasir
Route::middleware('auth')->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
});

require __DIR__ . '/auth.php';
