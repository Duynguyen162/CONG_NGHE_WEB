<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;

// Đường dẫn hiển thị danh sách đồ án (trang chủ)

Route::get('/', [IssuesController::class, 'index'])->name('Issue.index');

// Đường dẫn để tạo mới một đồ án (hiển thị form thêm mới)
Route::get('/Issue/create', [IssuesController::class, 'create'])->name('Issue.create');

// Đường dẫn để lưu dữ liệu đồ án mới (thực hiện thêm mới)
Route::post('/Issue', [IssuesController::class, 'store'])->name('Issue.store');

// Đường dẫn để hiển thị chi tiết một đồ án cụ thể (tuỳ chọn)
Route::get('/Issue/{id}', [IssuesController::class, 'show'])->name('Issue.show');

// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/Issue/{id}/edit', [IssuesController::class, 'edit'])->name('Issue.edit');

// Đường dẫn để cập nhật thông tin đồ án (thực hiện cập nhật)
Route::put('/Issue/{id}', [IssuesController::class, 'update'])->name('Issue.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/Issue/{id}', [IssuesController::class, 'destroy'])->name('Issue.destroy');
