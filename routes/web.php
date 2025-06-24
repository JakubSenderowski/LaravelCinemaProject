<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\AdminRezerwacjeController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RezerwacjeController;
use App\Models\Film;
use App\Models\User;

Route::get('/', [FilmController::class, 'index']);

Route::get('/rezerwacja', [RezerwacjeController::class, 'show']);
Route::get('/rezerwacja/{id}', [RezerwacjeController::class, 'create'])->name('rezerwacja.create');
Route::post('/rezerwacja', [RezerwacjeController::class, 'store'])->name('rezerwacja.store');
Route::get('/rezerwacja-dokonana', [RezerwacjeController::class, 'showRezerwacje'])->name('rezerwacja.showRezerwacje');
Route::get('/rezerwacja-dokonana-edycja/{id}', [RezerwacjeController::class, 'editView'])->name('rezerwacja.editView');
Route::post('/rezerwacja-dokonana-edycja/{id}', [RezerwacjeController::class, 'update'])->name('rezerwacja.update');
Route::delete('rezerwacja-dokonana/{id}', [RezerwacjeController::class, 'delete'])->name('rezerwacja.delete');

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name('login.post');

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name('register.post');

Route::post('/logout', [AuthController::class, "logout"])->name("logout");



Route::get('/dashboard', [AdminController::class, "adminDashboard"])->name("dashboard");

//Zarządzanie Filmami - Adminek
Route::get('/filmy-zarzadzanie', [AdminFilmController::class, "index"])->name("admin.filmy.index");
Route::get('/filmy-zarzadzanie-dodawanie', [AdminFilmController::class, 'create'])->name('admin.filmy.create');
Route::post('/filmy-zarzadzanie-dodawanie', [AdminFilmController::class, 'store'])->name('admin.filmy.store');
Route::get('/filmy-zarzadzanie-edycja/{id}', [AdminFilmController::class, 'edit'])->name('admin.filmy.editView');
Route::post('/filmy-zarzadzanie-edycja/{id}', [AdminFilmController::class, 'update'])->name('admin.filmy.update');
Route::delete('filmy-zarzadzanie/{id}', [AdminFilmController::class, 'destroy'])->name('admin.filmy.destroy');
//Zarządzanie Rezerwacjami - Adminek
Route::get('/rezerwacje-zarzadzanie', [AdminRezerwacjeController::class, "index"])->name("admin.rezerwacje.index");
