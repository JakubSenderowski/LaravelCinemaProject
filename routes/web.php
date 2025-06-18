<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Film;
use App\Models\User;

Route::get('/', function () {
    $filmy = Film::hotMovies();
    $filmyWszystkie = Film::allMovies();
    $filmyPrzeliczone = Film::moviesCount();
    return view('welcome', compact('filmy', 'filmyWszystkie', 'filmyPrzeliczone'));
});

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name('login.post');

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name('register.post');

Route::post('/logout', [AuthController::class, "logout"])->name("logout");

