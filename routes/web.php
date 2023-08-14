<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\PostDec;

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
    return view('principal');
});

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

route::get('/login',[LoginController::class,'index'])->name('login');
route::post('/login',[LoginController::class,'store']);
route::post('/logout',[logoutController::class,'store'])->name('logout');

route::get('/{user:username}', [PostController::class,'index'])->name('post.index');
route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
route::post('/posts',[PostController::class,'store'])->name('posts.store');

route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
