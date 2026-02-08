<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;


 
Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::prefix('/posts')->group(function () {

    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/store', [PostController::class, 'store'])->name('posts.store');
     Route::get('/edit', [PostController::class, 'edit'])->name('posts.edit');

    Route::get('/destroy/{id}', function () {
      return view('posts/delete');
    })->name('posts.destroy');

    Route::get('/update', function () {
      return view('posts/update');
    })->name('posts.update');
 
  });
 