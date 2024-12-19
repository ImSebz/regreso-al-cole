<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;

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

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/registro-compra', function () {
    return view('registro-compra');
})->middleware('auth')->name('registro-compra');

Route::get('/galeria', function () {
    return view('galeria');
})->middleware('auth')->name('galeria');

Route::get('/ganadores', function () {
    return view('ganadores');
})->middleware('auth')->name('ganadores');