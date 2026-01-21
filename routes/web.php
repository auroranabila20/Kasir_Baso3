<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::post('/login', [LoginController::class, 'handleLogin'])
    ->name('login')
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | KASIR / POS
    |--------------------------------------------------------------------------
    */
    Route::get('/kasir', [KasirController::class, 'index'])
        ->name('kasir');

    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */
    Route::get('/transaksi', [TransaksiController::class, 'index'])
        ->name('transaksi.index');

    Route::post('/transaksi', [TransaksiController::class, 'store'])
        ->name('transaksi.store');

    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])
        ->name('transaksi.edit');

    Route::get('/transaksi/{id}/print', [TransaksiController::class, 'print'])
        ->name('transaksi.print');

    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])
        ->name('transaksi.show');

    Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])
        ->name('transaksi.update');

    Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])
        ->name('transaksi.destroy');
        
    Route::get('/transaksi/{id}/pdf', [TransaksiController::class, 'pdf'])
    ->name('transaksi.pdf');


    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */
    Route::prefix('master-data')->as('master-data.')->group(function () {

        Route::prefix('kategori')->as('kategori.')
            ->controller(KategoriController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

        Route::prefix('product')->as('product.')
            ->controller(ProductController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
    });
});
