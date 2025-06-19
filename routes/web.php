<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RezerwacjeController;
use App\Models\Film;
use App\Models\User;

Route::get('/', [FilmController::class, 'index']);

Route::get('/rezerwacja', [RezerwacjeController::class, 'show']);
Route::get('/rezerwacja/{id}', [RezerwacjeController::class, 'create'])->name('rezerwacja.create');
Route::post('/rezerwacja', [RezerwacjeController::class, 'store'])->name('rezerwacja.store');

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name('login.post');

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name('register.post');

Route::post('/logout', [AuthController::class, "logout"])->name("logout");
Route::get('/dashboard', [AdminController::class, "adminDashboard"])->name("dashboard");

