<?php

namespace App\Http\Controllers;

use App\Business\GioHangBiz\GioHangBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Gio Hang Controller
 * 
 * @auth: Vo Duc Trung
 */

class GioHangController extends Controller
{
    /* Gio Hang Business */
    protected GioHangBusiness $GioHangBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->GioHangBusiness = new GioHangBusiness();
    }

    /**
     * Tạo một sản phẩm
     */
    public function createGioHang(Request $request)
    {
        $khachhang = Auth::user();
        $makh = $khachhang->makh;

        try {
            $response = $this->GioHangBusiness->createGioHang($request, $makh);
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
    public function getAllGioHang(Request $request)
    {
        $khachhang = Auth::user();
        $makh = $khachhang->makh;

        try {
            $GioHangs = $this->GioHangBusiness->getAllGioHang($request, $makh);
            return response()->json($GioHangs);
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
    public function updateGioHang(Request $request, string $magh)
    {
        try {
            $result = $this->GioHangBusiness->updateGioHang($request, $magh);
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
    public function deleteGioHang(string $magh)
    {
        try {
            $result = $this->GioHangBusiness->deleteGioHang($magh);

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
