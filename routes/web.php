<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Models\Track;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('test', [HomeController::class, 'test']);

// Route::prefix('tracks.')->group(function () {
//     Route::get('index', [HomeController::class, 'index'])->name('tracks.index');
// });

Route::controller(TrackController::class)->prefix('tracks')->name('tracks.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{track}', 'show')->name('show');
    Route::get('/{track}/edit', 'edit')->name('edit');
    Route::put('/{track}', 'update')->name('update');
    Route::delete('/{track}', 'destroy')->name('destroy');
});



// Route::resources('tracks', TrackController::class);