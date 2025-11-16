<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Superadmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UlasanController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'))->name('welcome');

// Produk publik
Route::get('/produk', [ProductController::class, 'publicIndex'])->name('produk.public');
Route::get('/produk/{id}', [ProductController::class, 'publicDetail'])->name('produk.detail');
Route::get('/produk', [ProductController::class, 'publicIndex'])->name('produk.public');
Route::get('/produk/{id}', [ProductController::class, 'publicDetail'])->name('produk.detail');
// Route::post('/ulasan/store', [ReviewController::class, 'store'])->name('ulasan.store');
Route::post('/ulasan', [ReviewController::class, 'store'])->name('ulasan.store');



// Kategori publik
Route::get('/kategori', [CategoryController::class, 'publicIndex'])->name('kategori.public');
Route::get('/kategori/{id}', [CategoryController::class, 'showProducts'])->name('kategori.produk');
Route::get('/kategori/search', [CategoryController::class, 'search'])->name('kategori.search');
Route::get('/kategori/filter', [CategoryController::class, 'filter'])->name('kategori.filter');

// Halaman statis
Route::view('/kontak', 'public.kontak')->name('kontak');
Route::view('/tentang', 'public.tentang')->name('tentang');

/*
|--------------------------------------------------------------------------
| AUTH (MODAL LOGIN)
|--------------------------------------------------------------------------
*/
Route::post('/modal-login', [ModalAuthController::class, 'login'])->name('modal.login');
Route::post('/modal-logout', [ModalAuthController::class, 'logout'])->name('modal.logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (ROLE: admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Kategori & Produk
        Route::resource('kategori', CategoryController::class)->parameters([
            'kategori' => 'category',
        ]);

        Route::resource('products', ProductController::class);

        // Ulasan
        Route::get('/ulasan', [App\Http\Controllers\Admin\UlasanController::class, 'index'])->name('ulasan.index');
        Route::delete('/ulasan/{id}', [App\Http\Controllers\Admin\UlasanController::class, 'destroy'])->name('ulasan.delete');
        

        // Stores
        Route::get('/stores', [App\Http\Controllers\Admin\StoreController::class, 'index'])->name('stores.index');

        // Notifikasi
        Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi.index');
        Route::middleware(['auth', 'role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
        Route::resource('products', ProductController::class);
    });

        // Route::get('/admin/menu/{menu}', [App\Http\Controllers\Admin\MenuController::class, 'show'])
        // ->name('admin.menu.show');


    });

/*
|--------------------------------------------------------------------------
| SUPERADMIN ROUTES (ROLE: superadmin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:superadmin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('dashboard');

        // CRUD Admin
        // Route::resource('admin', App\Http\Controllers\Superadmin\AdminController::class);

        // Stores
        // Route::get('/stores', [App\Http\Controllers\Superadmin\storesController::class, 'index'])->name('stores.index');
        // Route::delete('/stores/{id}', [App\Http\Controllers\Superadmin\storesController::class, 'destroy'])->name('stores.delete');

        // Laporan ulasan
        // Route::get('/laporan', [App\Http\Controllers\Superadmin\LaporanController::class, 'index'])->name('laporan.index');
        // Route::put('/laporan/{id}/tindak', [App\Http\Controllers\Superadmin\LaporanController::class, 'tindak'])->name('laporan.tindak');

        // Notifikasi
        Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi.index');
        Route::post('/notifikasi/kirim', [NotificationController::class, 'store'])->name('notifikasi.kirim');
    });
