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
    return view('user.ThanhToan1'); // This is the ThanhToan1.blade.php file
});

// Route for view DonHang
Route::get('/order', function () {
    return view('user.DonHang'); // This is the DonHang.blade.php file
});

// Route for view TrangChu
Route::get('/trangchu', function () {
    return view('user.TrangChu'); // This is the TrangChu.blade.php file
});
