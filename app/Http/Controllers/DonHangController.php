<?php

namespace App\Http\Controllers;

use App\Business\DonHangBiz\DonHangBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Gio Hang Controller
 * 
 * @auth: Vo Duc Trung
 */

class DonHangController extends Controller
{
    /* Gio Hang Business */
    protected DonHangBusiness $DonHangBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->DonHangBusiness = new DonHangBusiness();
    }

    /**
     * Tạo một sản phẩm
     */
    public function createDonHang(Request $request)
    {
        $khachhang = Auth::user();
        $makh = $khachhang->makh;

        try {
            $response = $this->DonHangBusiness->createDonHang($request, $makh);
            return response()->json($response);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Lọc sản phẩm
     */
    public function getAllDonHang(Request $request)
    {
        $khachhang = Auth::user();
        $makh = $khachhang->makh;

        try {
            $DonHangs = $this->DonHangBusiness->getAllDonHang($request, $makh);
            return response()->json($DonHangs);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Cập nhật thông tin sản phẩm 
     */
    public function updateDonHang(Request $request, string $madh)
    {
        try {
            $result = $this->DonHangBusiness->updateDonHang($request, $madh);
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Xóa thông tin sản phẩm
     */
    public function deleteDonHang(string $madh)
    {
        try {
            $result = $this->DonHangBusiness->deleteDonHang($madh);

            if ($result === false) {
                return response()->json([
                    'message' => 'Xóa sản phẩm không thành công.'
                ], 500); // 500 Internal Server Error
            }

            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra',
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
}
