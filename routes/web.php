<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('register'); //Comportamiento default
});
//GET y POST para el registro
Route::get('/register', 
[AuthController::class, 'showRegister'])->name('register');

Route::post('/register', [AuthController::class, 'register']);

//GET y POST para el login
Route::get('/login', 
[AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

//LogOut
Route::post('/logout', 
[AuthController::class, 'logout'])->name('logout');

//Midleware 
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');