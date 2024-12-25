<?php

namespace App\Http\Controllers\SanPham;

use App\Business\FunctionBiz\FunctionBusiness;
use App\Business\SanPhamBiz\SanPhamBusiness;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\HinhanhSanpham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * San Pham Controller
 * 
 * @auth: Vo Duc Trung
 */

class SanPhamController extends Controller
{
    /* Nhan Vien Business */
    protected SanPhamBusiness $sanPhamBusiness;

    /* FunctionBusiness */
    protected FunctionBusiness $functionBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sanPhamBusiness = new SanPhamBusiness();
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
    public function createSanPham(Request $request)
    {
        try {
            if (!$this->checkPermission("Product Management", "thêm")) {
                return response()->json([
                    'message' => "Bạn không có quyền truy cập thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            // Bắt đầu giao dịch với cơ sở dữ liệu
            DB::beginTransaction();

            $response = $this->sanPhamBusiness->createSanPham($request);

            // Kiểm tra nếu phản hồi có 'id'
            if ($response->getStatusCode() === 201) {
                $data = $response->getData(true); // Lấy dữ liệu từ JsonResponse dưới dạng mảng
                $masp = $data['id']; // Lấy 'id' từ mảng
                Log::info("Mã sản phẩm được tạo: " . $masp);
            } else {
                // Nếu không phải mã 201, xử lý lỗi
                Log::error("Lỗi khi tạo sản phẩm: " . $response->getContent());
            }



            // Xử lý việc tải lên ảnh
            $image = new ImageController();
            $url = $image->upload($request, $masp);
            Log::info("Mã sản phẩm được tạo: " . $masp);
            // Lưu URL và mã sản phẩm vào cơ sở dữ liệu
            HinhanhSanpham::create([
                'url_hinh' => $url,
                'masp' => $masp,
            ]);

            // Cam kết giao dịch
            DB::commit();
            return response()->json(true);
        } catch (Exception $e) {
            // Rollback giao dịch nếu có lỗi xảy ra
            DB::rollBack();
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Lọc sản phẩm
     */
    public function getAllSanPham(Request $request)
    {
        try {
            $SanPhams = $this->sanPhamBusiness->getAllSanPham($request);
            return response()->json($SanPhams);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    public function getTopRatedSanPham(Request $request)
    {
        try {
            $SanPhams = $this->sanPhamBusiness->getTopRatedSanPham($request);
            // Ghi mảng sản phẩm vào log
            Log::info('Danh sách sản phẩm yêu thích:', $SanPhams);
            return response()->json($SanPhams);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }

    public function getTopPromoSanPham(Request $request)
    {
        try {
            $SanPhams = $this->sanPhamBusiness->getTopPromoSanPham($request);
            // Ghi mảng sản phẩm vào log
            Log::info('Danh sách sản phẩm yêu thích:', $SanPhams);
            return response()->json($SanPhams);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Đã có lỗi xảy ra",
                'error' => $e->getMessage()
            ], 500); // 500 Internal Server Error
        }
    }


    public function getTopSalesSanPham(Request $request)
    {
        try {
            $SanPhams = $this->sanPhamBusiness->getTopSalesSanPham($request);
            // Ghi mảng sản phẩm vào log
            Log::info('Danh sách sản phẩm yêu thích:', $SanPhams);
            return response()->json($SanPhams);
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
    public function updateSanPham(Request $request, string $manv)
    {
        try {
            if (!$this->checkPermission("Product Management", "sửa")) {
                return response()->json([
                    'message' => "Bạn không có quyền cập nhật thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            $result = $this->sanPhamBusiness->updateSanPham($request, $manv);

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
    public function deleteSanPham(string $masp)
    {
        try {
            if (!$this->checkPermission("Product Management", "xóa")) {
                return response()->json([
                    'message' => "Bạn không có quyền xóa thông tin sản phẩm"
                ], 403); // 403 Forbidden
            }

            $result = $this->sanPhamBusiness->deleteSanPham($masp);

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
