<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngkotController;
use App\Http\Controllers\Admin\AngkotAdminController;
use App\Http\Controllers\Admin\AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Depan (Public)
Route::get('/', [AngkotController::class, 'index'])->name('home');

// Group Khusus yang Sudah Login (Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // --- DASHBOARD (HANYA ADMIN) ---
    Route::get('/dashboard', function () {
        // Cek Email Admin
        if (auth()->user()->email !== 'admin@gmail.com') {
            return redirect('/'); 
        }
        return view('dashboard');
    })->name('dashboard');

    // --- PROFILE USER ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- FITUR UTAMA: PETA ANGKOT (USER) ---
    Route::get('/angkot', [AngkotController::class, 'index'])->name('angkot.index');
    Route::get('/angkot/search', [AngkotController::class, 'search'])->name('angkot.search');

    // --- FITUR ADMIN: MANAJEMEN ANGKOT (CRUD) ---
    Route::resource('admin/angkots', AngkotAdminController::class)
        ->names([
            'index'   => 'angkots.index',
            'create'  => 'angkots.create',
            'store'   => 'angkots.store',
            'show'    => 'angkots.show',
            'edit'    => 'angkots.edit',
            'update'  => 'angkots.update',
            'destroy' => 'angkots.destroy',
        ]);

    // --- FITUR ADMIN: MANAJEMEN USER ---
    
    Route::resource('admin/users', AdminUserController::class)
        ->only(['index', 'destroy']) 
        ->names([
            'index' => 'users.index',
            'destroy' => 'users.destroy',
        ]);

    // --- FITUR LAIN ---
    Route::get('/user', function () {
        return view('user.home');
    });
});

require __DIR__.'/auth.php';