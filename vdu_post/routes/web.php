<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route hiển thị danh sách bài viết
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Route hiển thị form tạo bài viết mới
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Route lưu dữ liệu bài viết mới
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Route hiển thị chi tiết một bài viết
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Route hiển thị form chỉnh sửa bài viết
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Route cập nhật dữ liệu bài viết đã chỉnh sửa
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

// Route xóa bài viết
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
