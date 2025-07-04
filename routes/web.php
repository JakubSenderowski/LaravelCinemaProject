<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\AdminRezerwacjeController;
use App\Http\Controllers\AdminSeanseController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\AdminKategorieController;
use App\Http\Controllers\AdminTagController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\RezerwacjeController;
use App\Models\Film;
use App\Models\User;

Route::get('/', [FilmController::class, 'index']);
Route::view('/faq', 'faq.index')->name('faq.index');

Route::middleware('auth')->group(function () {
    Route::get('/rezerwacja', [RezerwacjeController::class, 'show']);
    Route::get('/rezerwacja/{id}', [RezerwacjeController::class, 'create'])
        ->name('rezerwacja.create');
    Route::post('/rezerwacja', [RezerwacjeController::class, 'store'])
        ->name('rezerwacja.store');
    Route::get('/rezerwacja-dokonana', [RezerwacjeController::class, 'showRezerwacje'])
        ->name('rezerwacja.showRezerwacje');
    Route::get('/rezerwacja-dokonana-edycja/{id}', [RezerwacjeController::class, 'editView'])
        ->name('rezerwacja.editView');
    Route::post('/rezerwacja-dokonana-edycja/{id}', [RezerwacjeController::class, 'update'])
        ->name('rezerwacja.update');
    Route::delete('/rezerwacja-dokonana/{id}', [RezerwacjeController::class, 'delete'])
        ->name('rezerwacja.delete');
});


Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name('login.post');

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name('register.post');

Route::post('/logout', [AuthController::class, "logout"])->name("logout");

Route::middleware(['auth','admin'])->group(function(){
Route::get('/dashboard', [AdminController::class, "adminDashboard"])->name("dashboard");
//Zarządzanie Filmami - Adminek
    Route::get('/filmy-zarzadzanie', [AdminFilmController::class, "index"])->name("admin.filmy.index");
    Route::get('/filmy-zarzadzanie-wyszukaj', [AdminFilmController::class, 'search'])->name('admin.filmy.search');
    Route::get('/filmy-zarzadzanie-dodawanie', [AdminFilmController::class, 'create'])->name('admin.filmy.create');
    Route::post('/filmy-zarzadzanie-dodawanie', [AdminFilmController::class, 'store'])->name('admin.filmy.store');
    Route::get('/filmy-zarzadzanie-edycja/{id}', [AdminFilmController::class, 'edit'])->name('admin.filmy.editView');
    Route::post('/filmy-zarzadzanie-edycja/{id}', [AdminFilmController::class, 'update'])->name('admin.filmy.update');
    Route::delete('filmy-zarzadzanie/{id}', [AdminFilmController::class, 'destroy'])->name('admin.filmy.destroy');

//Zarządzanie Rezerwacjami - Adminek
    Route::get('/rezerwacje-zarzadzanie', [AdminRezerwacjeController::class, "index"])->name("admin.rezerwacje.index");
    Route::get('/rezerwacje-zarzadzanie-wyszukaj', [AdminRezerwacjeController::class, 'search'])->name('admin.rezerwacje.search');
    Route::get('/rezerwacje-zarzadzanie-dodawanie', [AdminRezerwacjeController::class, 'create'])->name('admin.rezerwacje.create');
    Route::post('/rezerwacje-zarzadzanie-dodawanie', [AdminRezerwacjeController::class, 'store'])->name('admin.rezerwacje.store');
    Route::get('/rezerwacje-zarzadzanie-edycja/{id}', [AdminRezerwacjeController::class, 'edit'])->name('admin.rezerwacje.editView');
    Route::post('/rezerwacje-zarzadzanie-edycja/{id}', [AdminRezerwacjeController::class, 'update'])->name('admin.rezerwacje.update');
    Route::delete('rezerwacje-zarzadzanie/{id}', [AdminRezerwacjeController::class, 'destroy'])->name('admin.rezerwacje.destroy');
//Zarządzanie Seansami - Adminek
    Route::get('/seanse-zarzadzanie', [AdminSeanseController::class, 'index'])->name('admin.seanse.index');
    Route::get('/seanse-zarzadzanie-wyszukaj', [AdminSeanseController::class, 'search'])->name('admin.seanse.search');
    Route::get('/seanse-zarzadzanie-dodawanie', [AdminSeanseController::class, 'create'])->name('admin.seanse.create');
    Route::post('/seanse-zarzadzanie-dodawanie', [AdminSeanseController::class, 'store'])->name('admin.seanse.store');
    Route::get('/seanse-zarzadzanie-edycja/{id}', [AdminSeanseController::class, 'edit'])->name('admin.seanse.editView');
    Route::post('/seanse-zarzadzanie-edycja/{id}', [AdminSeanseController::class, 'update'])->name('admin.seanse.update');
    Route::delete('seanse-zarzadzanie/{id}', [AdminSeanseController::class, 'destroy'])->name('admin.seanse.destroy');
//Zarządzanie Salami - Adminek
    Route::get('/sale-zarzadzanie', [AdminSaleController::class, 'index'])->name('admin.sale.index');
    Route::get('/sale-zarzadzanie-wyszukaj', [AdminSaleController::class, 'search'])->name('admin.sale.search');
    Route::get('/sale-zarzadzanie-dodawanie', [AdminSaleController::class, 'create'])->name('admin.sale.create');
    Route::post('/sale-zarzadzanie-dodawanie', [AdminSaleController::class, 'store'])->name('admin.sale.store');
    Route::get('/sale-zarzadzanie-edycja/{id}', [AdminSaleController::class, 'edit'])->name('admin.sale.editView');
    Route::post('/sale-zarzadzanie-edycja/{id}', [AdminSaleController::class, 'update'])->name('admin.sale.update');
    Route::delete('sale-zarzadzanie/{id}', [AdminSaleController::class, 'destroy'])->name('admin.sale.destroy');
//Zarządzanie Kategoriami - Adminek
    Route::get('/kategorie-zarzadzanie', [AdminKategorieController::class, 'index'])->name('admin.kategorie.index');
    Route::get('/kategorie-wyszukaj', [AdminKategorieController::class, 'search'])->name('admin.kategorie.search');
    Route::get('/kategorie-zarzadzanie-dodawanie', [AdminKategorieController::class, 'create'])->name('admin.kategorie.create');
    Route::post('/kategorie-zarzadzanie-dodawanie', [AdminKategorieController::class, 'store'])->name('admin.kategorie.store');
    Route::get('/kategorie-zarzadzanie-edycja/{id}', [AdminKategorieController::class, 'edit'])->name('admin.kategorie.editView');
    Route::post('/kategorie-zarzadzanie-edycja/{id}', [AdminKategorieController::class, 'update'])->name('admin.kategorie.update');
    Route::delete('kategoria-zarzadzanie/{id}', [AdminKategorieController::class, 'destroy'])->name('admin.kategorie.destroy');
//Zarządzanie Tagami - Adminek
    Route::get('/tagi-zarzadzanie', [AdminTagController::class, 'index'])->name('admin.tags.index');
    Route::get('/tagi-wyszukaj', [AdminTagController::class, 'search'])->name('admin.tags.search');
    Route::get('/tagi-zarzadzanie-dodawanie', [AdminTagController::class, 'create'])->name('admin.tags.create');
    Route::post('/tagi-zarzadzanie-dodawanie', [AdminTagController::class, 'store'])->name('admin.tags.store');
    Route::get('/tagi-zarzadzanie-edycja/{id}', [AdminTagController::class, 'edit'])->name('admin.tags.editView');
    Route::post('/tagi-zarzadzanie-edycja/{id}', [AdminTagController::class, 'update'])->name('admin.tags.update');
    Route::delete('tagi-zarzadzanie/{id}', [AdminTagController::class, 'destroy'])->name('admin.tags.destroy');
//Zarządzanie Userami - Adminek
    Route::get('/uzytkownicy-zarzadzanie', [AdminUserController::class, 'index'])
        ->name('admin.users.index');
    Route::get('/uzytkownicy-zarzadzanie-wyszukaj', [AdminUserController::class, 'search'])
        ->name('admin.users.search');
    Route::get('/uzytkownicy-zarzadzanie-edycja/{id}', [AdminUserController::class, 'edit'])
        ->name('admin.users.editView');
    Route::post('/uzytkownicy-zarzadzanie-edycja/{id}', [AdminUserController::class, 'update'])
        ->name('admin.users.update');
    Route::delete('/uzytkownicy-zarzadzanie/{id}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');
});


Route::get('/search', SearchController::class)->name('filmy.search');
