<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\donhang;
use App\Models\khachhang;

class ReportController extends Controller
{

    public function getCounts()
    {
        // Tính số lượng đơn hàng
        $orderCount = donhang::count();

        // Tính số lượng nhân viên
        $employeeCount = khachhang::count();

        // Trả kết quả về dạng JSON
        return response()->json([
            'orderCount' => $orderCount,
            'customer' => $employeeCount,
        ]);
    }
}
