<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
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

// Laravel Breeze는 모든 Laravel 인증 기능과 우리가 사랑하는 Tailwind CSS 스타일 및 스타일 블레이드 템플릿이 내장되어 있습니다.
//  Laravel breeze는 로그인, 등록, 비밀번호 분실, 비밀번호 재설정, 이메일 확인 및 비밀번호 확인과 같은 인증 기능을 설정하고 구성하는 데 필요한 모든 컨트롤러, 경로 및보기를 생성합니다.

Route::resource('/posts', PostsController::class)->middleware(['auth']); 
// resource를 했을때는 라우트 이름이 자동으로 지정되어있다

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::delete('/posts/images/{id}', [PostsController::class, 'deleteImage'])->middleware(['auth']);

Route::post('/like/{post}',[LikesController::class, 'store'])->middleware(['auth'])->name('like.store');

require __DIR__.'/auth.php'; // 현재 디렉토리의 절대 경로를 출력해주는 상수

Route::resource('/comments', CommentsController::class);