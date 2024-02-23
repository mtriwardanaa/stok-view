<?php

use Illuminate\Support\Facades\Route;
use Modules\FormMasuk\App\Http\Controllers\FormMasukController;

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
    Route::resource('form-masuk', FormMasukController::class)->names('form-masuk');
    Route::get('form-masuk/delete/{id}', [FormMasukController::class, 'delete']);
});
