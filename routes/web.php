<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfIsAdmin;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;

Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy'])->name('playlists.destroy');
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlists.create');
Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
Route::put('/playlists/{id}', [PlaylistController::class, 'update'])->name('playlists.update');
Route::get('/playlists/{id}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit');
Route::post('/playlists/store', [PlaylistController::class, 'store'])->name('playlists.store');
Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlists.index');


Route::delete('/musics/{id}', [MusicController::class, 'destroy'])->name('musics.destroy');
Route::get('/musics/create', [MusicController::class, 'create'])->name('musics.create');
Route::get('/musics/{id}', [MusicController::class, 'show'])->name('musics.show');
Route::put('/musics/{id}', [MusicController::class, 'update'])->name('musics.update');
Route::get('/musics/{id}/edit', [MusicController::class, 'edit'])->name('musics.edit');
Route::post('/musics/store', [MusicController::class, 'store'])->name('musics.store');
Route::get('/musics', [MusicController::class, 'index'])->name('musics.index');


Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums.show');
Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('albums.update');
Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::post('/albums/store', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');


Route::delete('/artists/{id}', [ArtistController::class, 'destroy'])->name('artists.destroy');
Route::get('/artists/create', [ArtistController::class, 'create'])->name('artists.create');
Route::get('/artists/{id}', [ArtistController::class, 'show'])->name('artists.show');
Route::put('/artists/{id}', [ArtistController::class, 'update'])->name('artists.update');
Route::get('/artists/{id}/edit', [ArtistController::class, 'edit'])->name('artists.edit');
Route::post('/artists/store', [ArtistController::class, 'store'])->name('artists.store');
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');


Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        Route::delete('/users/{users}/destroy', [UserController::class, 'destroy'])->name('users.destroy')->middleware(CheckIfIsAdmin::class);
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{users}', [UserController::class, 'show'])->name('users.show');
        Route::put('/users/{users}/', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/admin/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
