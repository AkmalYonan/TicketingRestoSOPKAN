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
    Route::get('/admin/menu', [AdminController::class, 'indexMenu'])->name('admin.menu');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/waiter', [WaiterController::class, 'index'])->name('waiter.index');
});

//kasir
Route::middleware('auth')->group(function () {
    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
});

require __DIR__ . '/auth.php';
