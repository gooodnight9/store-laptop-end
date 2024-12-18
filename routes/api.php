<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NhanVien\NhanVienController;
use App\Mail\SendOtpEmail;
use Illuminate\Support\Facades\Mail;

// AUTH Routes
Route::post('register', [AuthController::class, 'register']); // Đăng ký người dùng
Route::post('login', [AuthController::class, 'login']); // Đăng nhập người dùng
Route::post('loginAdmin', [AuthController::class, 'loginAdmin']); // Đăng nhập admin
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập (nếu cần)
Route::post('verifyOtp', [AuthController::class, 'verifyOtp']); // Xác thực OTP

// Routes sử dụng middleware 'auth:sanctum' cho bảo mật
Route::middleware('auth:sanctum')->group(function () {
    Route::get('nhanvien', [AuthController::class, 'nhanvien']); // Lấy thông tin nhân viên
    // Đăng xuất
    Route::middleware('auth:sanctum')->delete('logout', [AuthController::class, 'logout']);


    // NHANVIEN Routes (Quản lý nhân viên)
    Route::get('nhanviens', [NhanVienController::class, 'getInfoNhanVien']); // Lấy tất cả nhân viên
    Route::put('nhanviens/update', [NhanVienController::class, 'updateNhanVien']); // Cập nhật nhân viên
    Route::delete('nhanviens/delete', [NhanVienController::class, 'deleteNhanVien']); // Xóa nhân viên
    Route::get('nhanviens/search', [NhanVienController::class, 'getNhanVien']); // Tạo mới nhân viên
});
