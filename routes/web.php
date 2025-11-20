<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
// Tambahkan di routes/web.php

// Home (guest)
Route::get('/', function () { return view('welcome'); })->middleware('guest')->name('home');

// Rute Dashboard Normal (Bisa digunakan oleh user biasa setelah login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Admin Dashboard
// Perhatikan nama rutenya: 'admin.dashboard'
Route::get('/admin/dashboard', function () {
    // Mengarahkan ke view 'home' yang berisi dasbor admin
    return view('home'); 
})->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

// Rute Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('category', CategoryController::class);
Route::resource('products', ProductController::class);



require __DIR__.'/auth.php';