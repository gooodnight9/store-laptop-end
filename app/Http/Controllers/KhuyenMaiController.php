<?php

namespace App\Http\Controllers;

use App\Business\FunctionBiz\FunctionBusiness;
use App\Business\KhuyenMaiBiz\KhuyenMaiBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * San Pham Controller
 * 
 * @auth: Vo Duc Trung
 */

class KhuyenMaiController extends Controller
{
    /* Nhan Vien Business */
    protected KhuyenMaiBusiness $KhuyenMaiBusiness;

    /* FunctionBusiness */
    protected FunctionBusiness $functionBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->KhuyenMaiBusiness = new KhuyenMaiBusiness();
        $this->functionBusiness = new FunctionBusiness();
    }

    /**
     * Kiểm tra quyền truy cập của người dùng
     */
    protected function checkPermission($functionname, $permission)
    {
        $NhanVien = Auth::user();
        $Manv = $NhanVien->manv;
        return $this->functionBusiness->getFunctionWithPermissions($functionname, $Manv, $permission);
    }

    /**
     * Tạo một sản phẩm
     */
    public function createKhuyenMai(Request $request)
    {
        try {
            if (!$this->checkPermission("Promotion Management", "thêm")) {
                return response()->json([
                    'message' => "Bạn không có quyền truy cập thông tin Khuyến mãi"
                ], 403); // 403 Forbidden
            }

            $response = $this->KhuyenMaiBusiness->createKhuyenMai($request);

            return response()->json($response);
        } catch (Exception $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lọc sản phẩm
     */
    public function getAllKhuyenMai(Request $request)
    {
        try {
            if (!$this->checkPermission("Promotion Management", "xem")) {
                return response()->json([
                    'message' => "Bạn không có quyền truy cập thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            $KhuyenMais = $this->KhuyenMaiBusiness->getAllKhuyenMai($request);
            return response()->json($KhuyenMais);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Cập nhật thông tin sản phẩm 
     */
    public function updateKhuyenMai(Request $request, string $makm)
    {
        try {
            if (!$this->checkPermission("Promotion Management", "sửa")) {
                return response()->json([
                    'message' => "Bạn không có quyền cập nhật thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            $result = $this->KhuyenMaiBusiness->updateKhuyenMai($request, $makm);

            if ($result === false) {
                return response()->json([
                    'message' => 'Cập nhật thông tin sản phẩm không thành công.'
                ], 500); // 500 Internal Server Error
            }

            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Xóa thông tin nhân viên
     */
    public function deleteKhuyenMai(string $makm)
    {
        try {
            if (!$this->checkPermission("Promotion Management", "xóa")) {
                return response()->json([
                    'message' => "Bạn không có quyền xóa thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            $result = $this->KhuyenMaiBusiness->deleteKhuyenMai($makm);

            if ($result === false) {
                return response()->json([
                    'message' => 'Xóa sản phẩm không thành công.'
                ], 500); // 500 Internal Server Error
            }

            return response()->json($result);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }
}
