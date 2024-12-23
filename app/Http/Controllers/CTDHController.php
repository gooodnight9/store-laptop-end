<?php

namespace App\Http\Controllers;

use App\Business\CTDHBiz\CTDHBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

/**
 * CTDH Controller
 * 
 * @auth Vo Duc Trung
 */
class CTDHController extends Controller
{
    protected CTDHBusiness $CTDHBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->CTDHBusiness = new CTDHBusiness();
    }

    /**
     * Tạo một sản phẩm trong CTDH
     */
    public function createCTDH(Request $request)
    {
        try {
            $response = $this->CTDHBusiness->createCTDH($request);
            return response()->json([
                'message' => 'Tạo CTDH thành công.',
                'data' => $response
            ], 201); // 201 Created
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi tạo CTDH.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lấy danh sách CTDH theo mã đơn hàng
     */
    public function getAllCTDH(Request $request, string $madh)
    {
        if (empty($madh)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã đơn hàng (madh).'
            ], 400); // 400 Bad Request
        }

        try {
            $CTDHs = $this->CTDHBusiness->getAllCTDH($request, $madh);
            return response()->json([
                'message' => 'Lấy danh sách CTDH thành công.',
                'data' => $CTDHs
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi lấy danh sách CTDH.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cập nhật thông tin CTDH
     */
    public function updateCTDH(Request $request, string $madh, string $masp)
    {
        if (empty($madh) || empty($masp)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã đơn hàng (madh) và mã sản phẩm (masp).'
            ], 400); // 400 Bad Request
        }

        try {
            $result = $this->CTDHBusiness->updateCTDH($request, $madh, $masp);
            return response()->json([
                'message' => 'Cập nhật CTDH thành công.',
                'data' => $result
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi cập nhật CTDH.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Xóa thông tin CTDH
     */
    public function deleteCTDH(string $madh, string $masp)
    {
        if (empty($madh) || empty($masp)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã đơn hàng (madh) và mã sản phẩm (masp).'
            ], 400); // 400 Bad Request
        }

        try {
            $result = $this->CTDHBusiness->deleteCTDH($madh, $masp);

            if (!$result) {
                return response()->json([
                    'message' => 'Không tìm thấy hoặc xóa CTDH không thành công.'
                ], 404); // 404 Not Found
            }

            return response()->json([
                'message' => 'Xóa CTDH thành công.'
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi xóa CTDH.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
