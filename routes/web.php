<?php

use App\Http\Controllers\Admin\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.produk.index');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('produk', ProdukController::class)->parameters([
        'produk' => 'produk',
    ]);
});

