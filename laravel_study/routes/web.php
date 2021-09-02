<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layouts.app');
});

Route::get('/hello', function () {
    return view('layouts.hello');
});

// php artisan route:list 라우트리스트 명령어
// Route::get('/post', [PostsController::class, 'index']);
// Route::get('/create', [PostsController::class, 'create']);
// Route::get('/store', [PostsController::class, 'store']);
Route::resource('/posts', PostsController::class);

// php artisan make:model Post -mf 모델 Post를 만듬과 동시에 migration과 factory를 함께 만들어준다.
