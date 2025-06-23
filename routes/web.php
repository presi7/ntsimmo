<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Page publique d'accueil (liste des biens & artisans)
Route::get('/', [BienController::class, 'home'])
     ->name('home');

Route::get('biens', [BienController::class, 'index'])
     ->name('biens.index');
Route::get('ouvriers', [ArtisanController::class, 'index'])
     ->name('artisans.index');

// 2. Routes paramétrées publiques (show), mais {id} uniquement numérique
Route::get('biens/{bien}', [BienController::class, 'show'])
     ->whereNumber('bien')
     ->name('biens.show');

Route::get('artisans/{artisan}', [ArtisanController::class, 'show'])
     ->whereNumber('artisan')
     ->name('artisans.show');

// 3. Auth (Breeze)
require __DIR__ . '/auth.php';

// 4. Dashboard
Route::get('/dashboard', fn() => redirect()->route('biens.index'))
     ->middleware(['auth','verified'])
     ->name('dashboard');

// 5. CRUD protégées — NOTEZ L'ORDRE : create avant {id}
Route::middleware(['auth','verified'])->group(function () {
    // Biens
    Route::get('biens/create',      [BienController::class, 'create'])
         ->name('biens.create');
    Route::post('biens',            [BienController::class, 'store'])
         ->name('biens.store');
    Route::get('biens/{bien}/edit', [BienController::class, 'edit'])
         ->whereNumber('bien')
         ->name('biens.edit');
    Route::put('biens/{bien}',      [BienController::class, 'update'])
         ->whereNumber('bien')
         ->name('biens.update');
    Route::delete('biens/{bien}',   [BienController::class, 'destroy'])
         ->whereNumber('bien')
         ->name('biens.destroy');

    // Artisans
    Route::get('artisans/create',      [ArtisanController::class, 'create'])
         ->name('artisans.create');
    Route::post('artisans',            [ArtisanController::class, 'store'])
         ->name('artisans.store');
    Route::get('artisans/{artisan}/edit', [ArtisanController::class, 'edit'])
         ->whereNumber('artisan')
         ->name('artisans.edit');
    Route::put('artisans/{artisan}',      [ArtisanController::class, 'update'])
         ->whereNumber('artisan')
         ->name('artisans.update');
    Route::delete('artisans/{artisan}',   [ArtisanController::class, 'destroy'])
         ->whereNumber('artisan')
         ->name('artisans.destroy');
});

// 6. Profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile',   [ProfileController::class, 'edit']   )->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'] )->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 7. Contact & About
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])
     ->name('contact.show');
Route::post('/contact',[ \App\Http\Controllers\ContactController::class, 'send'])
     ->name('contact.send');

Route::get('/about', fn() => view('about'))
     ->name('about');
