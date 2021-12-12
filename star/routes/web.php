<?php

use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');




Route::get('/gal', function () {
    return Inertia::render('posts/gal');
})->name('gal')->middleware(['auth']);

Route::get('/posts/index', function () {
    return Inertia::render('posts/index');
})->name('posts.index')->middleware(['auth']);

Route::get('/posts/search', function() {
    return Inertia::render('posts.search', [PostController::class, 'search']);
})->name('/posts/search')->middleware(['auth']);


Route::resource('/posts', PostController::class)->middleware(['auth']);
