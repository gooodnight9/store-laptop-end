<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SinhVien\NhanVienController;

// AUTH 
// Route đăng ký
Route::post('register', [AuthController::class, 'register']);
// Route đăng nhập (POST)
Route::post('login', [AuthController::class, 'login']);
// Route đăng nhập admin (POST)
Route::post('loginAdmin', [AuthController::class, 'loginAdmin']);
// Đảm bảo bạn có route GET cho login nếu cần thiết
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Group các route có middleware bảo vệ bằng 'auth:sanctum'
Route::middleware('auth:sanctum')->get('nhanvien', [AuthController::class, 'nhanvien']);


//  NHANVIEN
// Route list employee
Route::middleware('auth:sanctum')->get('nhanviens', [NhanVienController::class, 'getInfoNhanVien']);
