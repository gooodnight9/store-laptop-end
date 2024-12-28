<?php

namespace App\Http\Controllers;

use App\Business\CTSPBiz\CTSPBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

/**
 * CTSP Controller
 * 
 * @auth Vo Duc Trung
 */
class CTSPController extends Controller
{
    protected CTSPBusiness $CTSPBusiness;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->CTSPBusiness = new CTSPBusiness();
    }

    /**
     * Tạo một CTSP mới
     */
    public function createCTSP(Request $request)
    {
        try {
            $response = $this->CTSPBusiness->createCTSP($request);
            return response()->json([
                'message' => 'Tạo CTSP thành công.',
                'data' => $response
            ], 201); // 201 Created
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi tạo CTSP.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Lấy chi tiết CTSP theo mã sản phẩm, màu và dung lượng
     */
    public function getCTSP(Request $request, string $masp, string $mau, string $dungluong)
    {
        if (empty($masp) || empty($mau) || empty($dungluong)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã sản phẩm (masp), màu (mau) và dung lượng (dungluong).'
            ], 400); // 400 Bad Request
        }

        try {
            $CTSP = $this->CTSPBusiness->getCTSP($request, $masp, $mau, $dungluong);
            return response()->json([
                'message' => 'Lấy chi tiết CTSP thành công.',
                'data' => $CTSP
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi lấy chi tiết CTSP.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cập nhật thông tin CTSP
     */
    public function updateCTSP(Request $request, string $masp, string $dungluong, string $mau)
    {
        if (empty($masp) || empty($dungluong) || empty($mau)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã sản phẩm (masp), dung lượng (dungluong) và màu (mau).'
            ], 400); // 400 Bad Request
        }

        try {
            $result = $this->CTSPBusiness->updateCTSP($request, $masp, $dungluong, $mau);
            return response()->json([
                'message' => 'Cập nhật CTSP thành công.',
                'data' => $result
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi cập nhật CTSP.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Xóa thông tin CTSP
     */
    public function deleteCTSP(string $masp, string $dungluong, string $mau)
    {
        if (empty($masp) || empty($dungluong) || empty($mau)) {
            return response()->json([
                'message' => 'Vui lòng cung cấp mã sản phẩm (masp), dung lượng (dungluong) và màu (mau).'
            ], 400); // 400 Bad Request
        }

        try {
            $result = $this->CTSPBusiness->deleteCTSP($masp, $dungluong, $mau);

            if (!$result) {
                return response()->json([
                    'message' => 'Không tìm thấy hoặc xóa CTSP không thành công.'
                ], 404); // 404 Not Found
            }

            return response()->json([
                'message' => 'Xóa CTSP thành công.'
            ], 200); // 200 OK
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Đã có lỗi xảy ra khi xóa CTSP.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
