<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('validate')->get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [Controller::class, 'login']);
