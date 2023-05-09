<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
 return response([
    "data"=>"Hello world"
 ]);
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::put('users/{id}', [UserController::class, 'put'])->name('users.show');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.delete');




Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.put');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.delete')
                                                               ->middleware('auth.post');
});
