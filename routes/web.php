<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', function () {
    session()->flush();
    return redirect('/login');
});

Route::get('/lihatpost', [PostController::class, 'index']);

Route::delete('/hapuspost/{id}', [PostController::class, 'hapus']);

Route::get('/tambahpost', [PostController::class, 'create']);

Route::post('/tambahpost', [PostController::class, 'store']);


Route::get('/Kategori', [PostController::class, 'create_kategori']);

Route::post('/store_kategori', [PostController::class, 'store_kategori']);

Route::put('/update_kategori/{id}', [PostController::class, 'update_kategori'])->name('update_kategori');


Route::delete('/destroy_kategori{id}', [PostController::class, 'destroy_kategori'])->name('destroy_kategori');

Route::get('/editpost/{id}', [PostController::class, 'formEdit']);

Route::post('/editpost/{id}', [PostController::class, 'update']);
