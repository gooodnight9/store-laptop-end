<?php

namespace App\Business\CTDHBiz;

use App\Business\CTDHBiz\SqlCTDH;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * CTDH Business Logic
 * 
 * @auth Vo Duc Trung
 */
class CTDHBusiness
{
    protected SqlCTDH $sqlCTDH;

    public function __construct()
    {
        $this->sqlCTDH = new SqlCTDH();
    }

    /**
     * Tạo một CTDH mới
     */
    public function createCTDH(Request $request)
    {
        try {
            $result = $this->sqlCTDH->createCTDH($request);
            return $result;
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in createCTDH: ' . $e->getMessage());
            throw new Exception('Không thể tạo CTDH. Vui lòng thử lại sau.');
        }
    }

    /**
     * Lấy tất cả CTDH theo mã đơn hàng
     */
    public function getAllCTDH(Request $request, string $madh): array
    {
        try {
            if (empty($madh)) {
                throw new Exception('Mã đơn hàng không được để trống.');
            }

            $result = $this->sqlCTDH->getAllCTDH($request, $madh);
            return $result;
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in getAllCTDH: ' . $e->getMessage());
            throw new Exception('Không thể lấy danh sách CTDH. Vui lòng thử lại sau.');
        }
    }

    /**
     * Cập nhật CTDH
     */
    public function updateCTDH(Request $request, string $madh, string $masp)
    {
        try {
            if (empty($madh) || empty($masp)) {
                throw new Exception('Mã đơn hàng hoặc mã sản phẩm không được để trống.');
            }

            $result = $this->sqlCTDH->updateCTDH($request, $madh, $masp);
            if (!$result) {
                throw new Exception('Không có thông tin nào được cập nhật.');
            }

            return $result;
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in updateCTDH: ' . $e->getMessage());
            throw new Exception('Không thể cập nhật CTDH. Vui lòng thử lại sau.');
        }
    }

    /**
     * Xóa CTDH
     */
    public function deleteCTDH(string $madh, string $masp)
    {
        try {
            if (empty($madh) || empty($masp)) {
                throw new Exception('Mã đơn hàng hoặc mã sản phẩm không được để trống.');
            }

            $result = $this->sqlCTDH->deleteCTDH($madh, $masp);
            if (!$result) {
                throw new Exception('Không thể xóa CTDH. Vui lòng kiểm tra thông tin.');
            }

            return $result;
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in deleteCTDH: ' . $e->getMessage());
            return false;
        }
    }
}
