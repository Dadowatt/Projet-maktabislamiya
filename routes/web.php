<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\AuteurUserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategorieUserController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\LivreUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware(['auth', 'is_admin'])->prefix('admin')
    ->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/livres', LivreController::class);
    Route::resource('/auteurs', AuteurController::class);
    Route::resource('/categories', CategorieController::class)->parameters(['categories' => 'categorie']);;
});

// Utilisateur
Route::middleware(['auth', 'is_user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/livres', [LivreUserController::class, 'index'])->name('livres');
    Route::get('/livres/{id}', [LivreUserController::class, 'show'])->name('livres.show');
    Route::post('/livres/{id}/favoris', [FavorisController::class, 'store'])->name('livres.favoris');
    Route::post('/livres/{id}/note', [LivreUserController::class, 'note'])->name('livres.note');
    Route::get('/auteurs', [AuteurUserController::class, 'index'])->name('auteurs');
    Route::get('/categories', [CategorieUserController::class, 'index'])->name('categories');
    Route::get('/themes', [ThemeUserController::class, 'index'])->name('themes');
});

require __DIR__.'/auth.php';
