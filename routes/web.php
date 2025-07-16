<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfIsAdmin;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\DashboardController;

Route::middleware('auth')->group(function () {

    Route::resource('playlists', PlaylistController::class);

    Route::post('/musics/{music}/like', [MusicController::class, 'like'])->name('musics.like');
    Route::delete('/musics/{music}/unlike', [MusicController::class, 'unlike'])->name('musics.unlike');
    Route::get('/musics/{id}/play', [MusicController::class, 'play'])->name('musics.play');
    Route::resource('musics', MusicController::class);

    Route::resource('albums', AlbumController::class);

    Route::resource('artists', ArtistController::class);

    Route::resource('users', UserController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {return view('welcome');})->name('home');

require __DIR__.'/auth.php';
