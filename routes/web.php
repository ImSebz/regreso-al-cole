<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\RegistroCompra;
use App\Models\RegistroFactura;
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
    if (auth()->check()) {
        return redirect()->route('ganadores');
    }

    $approvedCount = RegistroFactura::where('estado_id', 1)->count();
    return view('welcome', compact('approvedCount'));
})->name('home');

Route::get('/register', Register::class)->middleware('guest')->name('register');

Route::get('/login', Login::class)->middleware('guest')->name('login');

Route::get('/dashboard-backoffice', function () {
    return view('backoffice.index');
})->middleware('backoffice')->name('dashboard-backoffice');

Route::get('/registros-factura', function () {
    return view('backoffice.registros-factura');
})->middleware('backoffice')->name('registros-factura');

Route::get('/historial-factura', function () {
    return view('backoffice.historial-factura');
})->middleware('backoffice')->name('historial-factura');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::middleware(['auth'])->middleware(['tutor'])->group(function () {
    // Route::get('/registro-compra', RegistroCompra::class)->name('registro-compra');
    Route::get('/galeria', Galeria::class)->name('galeria');
    Route::get('/ganadores', Ganadores::class)->name('ganadores');
});

require __DIR__.'/auth.php';
