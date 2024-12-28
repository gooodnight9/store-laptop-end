<?php

use Illuminate\Support\Facades\Route;

// Route for view ChiTietSanPham
Route::get('/product-detail', function () {
    return view('user.ChiTietSanPham'); // This is the ChiTietSanPham.blade.php file
});

// Route for view SanPham
Route::get('/product-list', function () {
    return view('user.SanPham'); // This is the SanPham.blade.php file
});

// Route for view DKKH
Route::get('/dkkh', function () {
    return view('user.DKKH'); // This is the DKKH.blade.php file
});


// Route for view DNKH
Route::get('/dnkh', function () {
    return view('user.DNKH'); // This is the DNKH.blade.php file
});

// Route for view MaOTP
Route::get('/maotp', function () {
    return view('user.MaOTP'); // This is the MaOTP.blade.php file
});

// Route for view ThanhToan1
Route::get('/payment-step1', function () {
    return view('user.ThanhToanTong'); // This is the ThanhToan1.blade.php file
});

// Route for view ThanhToan1
Route::get('/donhang', function () {
    return view('user.DonHangTong'); // This is the ThanhToan1.blade.php file
});

// Route for view DonHang
Route::get('/order', function () {
    return view('user.DonHang'); // This is the DonHang.blade.php file
});

Route::get('/giohang', function () {
    return view('user.GioHang'); // This is the DonHang.blade.php file
});

// Route for view TrangChu
Route::get('/trangchu', function () {
    return view('user.TrangChu'); // This is the TrangChu.blade.php file
});

// Route for view TrangChu
Route::get('/welcome', function () {
    return view('welcome'); // This is the TrangChu.blade.php file
});

// Route for view TrangChu
Route::get('/ThongTin', function () {
    return view('ThongTinTaiKhoan'); // This is the TrangChu.blade.php file
});


// Route for view OTP
Route::get('/otp', function () {
    return view('emails.otp'); // This is the otp.blade.php file
});

// Route for view QLDonHang - ChiTietDonHang
Route::get('/ql-don-hang/chi-tiet', function () {
    return view('QLDonHang.ChiTietDonHang'); // This is the ChiTietDonHang.blade.php file
});

// Route for view QLDonHang - SuaDonHang
Route::get('/ql-don-hang/sua', function () {
    return view('QLDonHang.SuaDonHang'); // This is the SuaDonHang.blade.php file
});

// Route for view QLDonHang - TaoDonHang
Route::get('/ql-don-hang/tao', function () {
    return view('QLDonHang.TaoDonHang'); // This is the TaoDonHang.blade.php file
});

// Route for view QLDonHang - ThongBaoSuaDH
Route::get('/ql-don-hang/thong-bao-sua', function () {
    return view('QLDonHang.ThongBaoSuaDH'); // This is the ThongBaoSuaDH.blade.php file
});

// Route for view QLDonHang - ThongBaoSuaXoaDH
Route::get('/ql-don-hang/thong-bao-sua-xoa', function () {
    return view('QLDonHang.ThongBaoSuaXoaDH'); // This is the ThongBaoSuaXoaDH.blade.php file
});

// Route for view QLDonHang - ThongBaoXoaDH
Route::get('/ql-don-hang/thong-bao-xoa', function () {
    return view('QLDonHang.ThongBaoXoaDH'); // This is the ThongBaoXoaDH.blade.php file
});

// Route for view QLDonHang - ThongBaoXoaThanhCong
Route::get('/ql-don-hang/thong-bao-xoa-thanh-cong', function () {
    return view('QLDonHang.ThongBaoXoaThanhCong'); // This is the ThongBaoXoaThanhCong.blade.php file
});

// Route for view QLDonHang - ThongBaoXuatThanhCong
Route::get('/ql-don-hang/thong-bao-xuat-thanh-cong', function () {
    return view('QLDonHang.ThongBaoXuatThanhCong'); // This is the ThongBaoXuatThanhCong.blade.php file
});

// Route for view QLDonHang - XacnhanHuyDH
Route::get('/ql-don-hang/xac-nhan-huy', function () {
    return view('QLDonHang.XacnhanHuyDH'); // This is the XacnhanHuyDH.blade.php file
});

// Route for view QLDonHang - XacnhanSuaDH
Route::get('/ql-don-hang/xac-nhan-sua', function () {
    return view('QLDonHang.XacnhanSuaDH'); // This is the XacnhanSuaDH.blade.php file
});

// Route for view QLDonHang - XacnhanXoaDH
Route::get('/ql-don-hang/xac-nhan-xoa', function () {
    return view('QLDonHang.XacnhanXoaDH'); // This is the XacnhanXoaDH.blade.php file
});

// Route for OTP.blade.php
Route::get('/otp', function () {
    return view('OTP'); // This is the OTP.blade.php file
});

// Route for account.blade.php
Route::get('/account', function () {
    return view('account'); // This is the account.blade.php file
});

// Route for customer.blade.php
Route::get('/customer', function () {
    return view('customer'); // This is the customer.blade.php file
});

// Route for discount.blade.php
Route::get('/discount', function () {
    return view('discount'); // This is the discount.blade.php file
});

// Route for otp.blade.php in emails folder
Route::get('/email-otp', function () {
    return view('emails.otp'); // This is the otp.blade.php file inside emails folder
});

// Route for employee.blade.php
Route::get('/employee', function () {
    return view('employee'); // This is the employee.blade.php file
});

// Route for home.blade.php
Route::get('/home', function () {
    return view('home'); // This is the home.blade.php file
});

// Route for order.blade.php
Route::get('/order', function () {
    return view('order'); // This is the order.blade.php file
});

// Route for product.blade.php
Route::get('/product', function () {
    return view('product'); // This is the product.blade.php file
});

// Route for test.blade.php
Route::get('/test', function () {
    return view('test'); // This is the test.blade.php file
});

// Route for welcome.blade.php
Route::get('/welcome', function () {
    return view('welcome'); // This is the welcome.blade.php file
});




// Route for view admin - DNadmin
Route::get('/admin/dnadmin', function () {
    return view('admin.DNadmin'); // This is the DNadmin.blade.php file
});

// Route for view admin - Guimail
Route::get('/admin/guimail', function () {
    return view('admin.Guimail'); // This is the Guimail.blade.php file
});

// Route for view admin - Xacnhanma
Route::get('/admin/xacnhanma', function () {
    return view('admin.Xacnhanma'); // This is the Xacnhanma.blade.php file
});

// Route for view auth - login
Route::get('/auth/login', function () {
    return view('auth.login'); // This is the login.blade.php file
});

// Route for view auth - forgot
Route::get('/auth/forgot', function () {
    return view('auth.forgot'); // This is the forgot.blade.php file
});

// Route for view auth - register
Route::get('/auth/register', function () {
    return view('auth.register'); // This is the register.blade.php file
});

// Route for view auth - verify
Route::get('/auth/verify', function () {
    return view('auth.verify'); // This is the verify.blade.php file
});

// Route for view auth - passwords/confirm
Route::get('/auth/passwords/confirm', function () {
    return view('auth.passwords.confirm'); // This is the confirm.blade.php file
});

// Route for view auth - passwords/email
Route::get('/auth/passwords/email', function () {
    return view('auth.passwords.email'); // This is the email.blade.php file
});

// Route for view auth - passwords/reset
Route::get('/auth/passwords/reset', function () {
    return view('auth.passwords.reset'); // This is the reset.blade.php file
});
