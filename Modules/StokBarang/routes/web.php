<?php

use Illuminate\Support\Facades\Route;
use Modules\StokBarang\App\Http\Controllers\StokBarangController;

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

Route::group([], function () {
    Route::middleware('validate')->resource('stok-barang', StokBarangController::class)->names('stok-barang');
});
