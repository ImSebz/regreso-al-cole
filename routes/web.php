<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\RegistroCompra;
use App\Livewire\Dashboard\Galeria;
use App\Livewire\Dashboard\Ganadores;

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

Route::get('/registro-compra', RegistroCompra::class)->middleware('auth')->name('registro-compra');

Route::get('/galeria', Galeria::class)->middleware('auth')->name('galeria');

Route::get('/ganadores', Ganadores::class)->middleware('auth')->name('ganadores');

