<?php

use App\Http\Controllers\CTSPController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\VNPayController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NhanVien\NhanVienController;
use App\Http\Controllers\SanPham\SanPhamController;

// AUTH Routes
Route::post('register', [AuthController::class, 'register']); // Đăng ký người dùng
Route::post('registerKH', [AuthController::class, 'registerKH']); // Đăng ký người dùng
Route::post('login', [AuthController::class, 'login']); // Đăng nhập người dùng
Route::post('loginAdmin', [AuthController::class, 'loginAdmin']); // Đăng nhập admin
Route::post('verifyOtp', [AuthController::class, 'verifyOtp']); // Xác thực OTP
Route::post('verifyOtpKH', [AuthController::class, 'verifyOtpForKhachHang']); // Xác thực OTP
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);


// Routes sử dụng middleware 'auth:sanctum' cho bảo mật
Route::middleware('auth:sanctum')->group(function () {
    // Routes liên quan đến Auth
    Route::get('nhanvien', [AuthController::class, 'nhanvien']); // Lấy thông tin nhân viên hiện tại
    Route::delete('logout', [AuthController::class, 'logout']);  // Đăng xuất

    // Routes liên quan đến Nhân viên (Quản lý nhân viên)
    Route::prefix('nhanviens')->group(function () {
        Route::get('/', [NhanVienController::class, 'getInfoNhanVien']);        // Lấy tất cả nhân viên
        Route::put('/update', [NhanVienController::class, 'updateNhanVien']);   // Cập nhật thông tin nhân viên
        Route::delete('/delete', [NhanVienController::class, 'deleteNhanVien']); // Xóa nhân viên
        Route::get('/search', [NhanVienController::class, 'getNhanVien']);      // Tìm kiếm nhân viên
    });
});


// Sản phẩm Routes (Quản lý sản phẩm)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('sanpham/create', [SanPhamController::class, 'createSanPham']); // Tạo sản phẩm
    Route::put('sanpham/{masp}/update', [SanPhamController::class, 'updateSanPham']); // Cập nhật sản phẩm
    Route::delete('sanpham/{masp}/delete', [SanPhamController::class, 'deleteSanPham']); // Xóa sản phẩm
});

// Sản phẩm Routes (Quản lý sản phẩm)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('KhuyenMai/create', [KhuyenMaiController::class, 'createKhuyenMai']); // Tạo sản phẩm
    Route::get('KhuyenMais', [KhuyenMaiController::class, 'getAllKhuyenMai']); // Lấy danh sách sản phẩm
    Route::put('KhuyenMai/{makm}/update', [KhuyenMaiController::class, 'updateKhuyenMai']); // Cập nhật sản phẩm
    Route::delete('KhuyenMai/{makm}/delete', [KhuyenMaiController::class, 'deleteKhuyenMai']); // Xóa sản phẩm
});

// Giỏ Hàng Routes (Quản lý giỏ hàng)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('giohang/create', [GioHangController::class, 'createGioHang']); // Tạo giỏ hàng
    Route::get('giohangs', [GioHangController::class, 'getAllGioHang']); // Lấy danh sách sản phẩm trong giỏ hàng
    Route::put('giohang/{magh}update', [GioHangController::class, 'updateGioHang']); // Cập nhật thông tin sản phẩm trong giỏ hàng
    Route::delete('giohang/{magh}/delete', [GioHangController::class, 'deleteGioHang']); // Xóa sản phẩm khỏi giỏ hàng
});
// Đơn Hàng Routes (Quản lý đơn hàng)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('donhang/create', [DonHangController::class, 'createDonHang']); // Tạo đơn hàng
    Route::get('donhangs', [DonHangController::class, 'getAllDonHang']); // Lấy danh sách đơn hàng
    Route::put('donhang/{madh}/update', [DonHangController::class, 'updateDonHang']); // Cập nhật đơn hàng
    Route::delete('donhang/{madh}/delete', [DonHangController::class, 'deleteDonHang']); // Xóa đơn hàng
});

use App\Http\Controllers\CTDHController;
use App\Http\Controllers\ReportController;

Route::middleware('auth:sanctum')->group(function () {
    // Tạo chi tiết đơn hàng (CTDH)
    Route::post('ctdh/create', [CTDHController::class, 'createCTDH']); // Tạo CTDH

    // Lấy tất cả chi tiết đơn hàng theo mã đơn hàng
    Route::get('ctdh/{madh}', [CTDHController::class, 'getAllCTDH']); // Lấy danh sách CTDH theo mã đơn hàng

    // Cập nhật chi tiết đơn hàng (CTDH)
    Route::put('ctdh/update/{madh}/{masp}', [CTDHController::class, 'updateCTDH']); // Cập nhật CTDH

    // Xóa chi tiết đơn hàng (CTDH)
    Route::delete('ctdh/delete/{madh}/{masp}', [CTDHController::class, 'deleteCTDH']); // Xóa CTDH
});


// Lấy top 5 sản phẩm yêu thích nhất 
Route::get('user/sanphamsTopRated', [SanPhamController::class, 'getTopRatedSanPham']); // Lấy danh sách sản phẩm

// Lấy top 5 sản phẩm khuyến mãi 
Route::get('user/sanphamsPromo', [SanPhamController::class, 'getTopPromoSanPham']); // Lấy danh sách sản phẩm

// Lấy top 5 sản phẩm khuyến mãi 
Route::get('user/sanphamSales', [SanPhamController::class, 'getTopSalesSanPham']); // Lấy danh sách sản phẩm
Route::get('sanphams', [SanPhamController::class, 'getAllSanPham']); // Lấy danh sách sản phẩm
Route::get('sanpham', [SanPhamController::class, 'getSanPham']); // Lấy danh sách sản phẩm


Route::prefix('ctsp')->group(function () {
    // Tạo mới CTSP
    Route::post('create', [CTSPController::class, 'createCTSP']); // Tạo CTSP mới

    // Lấy chi tiết CTSP theo mã sản phẩm, màu, dung lượng
    Route::get('detail/{masp}/{mau}/{dungluong}', [CTSPController::class, 'getCTSP']); // Lấy chi tiết CTSP

    // Cập nhật CTSP
    Route::put('update/{masp}/{dungluong}/{mau}', [CTSPController::class, 'updateCTSP']); // Cập nhật CTSP

    // Xóa CTSP
    Route::delete('delete/{masp}/{dungluong}/{mau}', [CTSPController::class, 'deleteCTSP']); // Xóa CTSP
});
Route::post('/vnpay/create', [VnpayController::class, 'createPayment']);
Route::get('/vnpay/return', [VnpayController::class, 'return']);


Route::get('getcounts', [ReportController::class, 'getCounts']); // Lấy danh sách sản phẩm