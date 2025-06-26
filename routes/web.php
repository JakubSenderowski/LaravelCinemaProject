<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\AdminRezerwacjeController;
use App\Http\Controllers\AdminSeanseController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\AdminKategorieController;
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
Route::get('/rezerwacje-zarzadzanie-dodawanie', [AdminRezerwacjeController::class, 'create'])->name('admin.rezerwacje.create');
Route::post('/rezerwacje-zarzadzanie-dodawanie', [AdminRezerwacjeController::class, 'store'])->name('admin.rezerwacje.store');
Route::get('/rezerwacje-zarzadzanie-edycja/{id}', [AdminRezerwacjeController::class, 'edit'])->name('admin.rezerwacje.editView');
Route::post('/rezerwacje-zarzadzanie-edycja/{id}', [AdminRezerwacjeController::class, 'update'])->name('admin.rezerwacje.update');
Route::delete('rezerwacje-zarzadzanie/{id}', [AdminRezerwacjeController::class, 'destroy'])->name('admin.rezerwacje.destroy');
//Zarządzanie Seansami - Adminek
Route::get('/seanse-zarzadzanie', [AdminSeanseController::class, 'index'])->name('admin.seanse.index');
Route::get('/seanse-zarzadzanie-dodawanie', [AdminSeanseController::class, 'create'])->name('admin.seanse.create');
Route::post('/seanse-zarzadzanie-dodawanie', [AdminSeanseController::class, 'store'])->name('admin.seanse.store');
Route::get('/seanse-zarzadzanie-edycja/{id}', [AdminSeanseController::class, 'edit'])->name('admin.seanse.editView');
Route::post('/seanse-zarzadzanie-edycja/{id}', [AdminSeanseController::class, 'update'])->name('admin.seanse.update');
Route::delete('seanse-zarzadzanie/{id}', [AdminSeanseController::class, 'destroy'])->name('admin.seanse.destroy');
//Zarządzanie Salami - Adminek
Route::get('/sale-zarzadzanie', [AdminSaleController::class, 'index'])->name('admin.sale.index');
Route::get('/sale-zarzadzanie-dodawanie', [AdminSaleController::class, 'create'])->name('admin.sale.create');
Route::post('/sale-zarzadzanie-dodawanie', [AdminSaleController::class, 'store'])->name('admin.sale.store');
Route::get('/sale-zarzadzanie-edycja/{id}', [AdminSaleController::class, 'edit'])->name('admin.sale.editView');
Route::post('/sale-zarzadzanie-edycja/{id}', [AdminSaleController::class, 'update'])->name('admin.sale.update');
Route::delete('sale-zarzadzanie/{id}', [AdminSaleController::class, 'destroy'])->name('admin.sale.destroy');
//Zarządzanie Kategoriami - Adminek
Route::get('/kategorie-zarzadzanie', [AdminKategorieController::class, 'index'])->name('admin.kategorie.index');
