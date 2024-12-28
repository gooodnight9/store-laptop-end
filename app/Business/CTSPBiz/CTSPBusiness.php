<?php

namespace App\Business\CTSPBiz;

use App\Business\CTSPBiz\SqlCTSP;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * CTSP Business Logic
 * 
 * @auth Vo Duc Trung
 */
class CTSPBusiness
{
    protected SqlCTSP $sqlCTSP;

    public function __construct()
    {
        $this->sqlCTSP = new SqlCTSP();
    }

    /**
     * Tạo một CTSP mới
     */
    public function createCTSP(Request $request)
    {
        try {
            // Gọi hàm createCTSP từ SqlCTSP
            $result = $this->sqlCTSP->createCTSP($request);
            return $result;  // Trả về kết quả từ SqlCTSP
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in createCTSP: ' . $e->getMessage());
            throw new Exception('Không thể tạo CTSP. Vui lòng thử lại sau.');
        }
    }

    /**
     * Lấy chi tiết CTSP theo mã sản phẩm, màu và dung lượng
     */
    public function getCTSP(Request $request, string $masp, string $mau, string $dungluong)
    {
        try {
            // Kiểm tra thông tin đầu vào
            if (empty($masp) || empty($mau) || empty($dungluong)) {
                throw new Exception('Mã sản phẩm, màu hoặc dung lượng không được để trống.');
            }

            // Gọi hàm getCTSP từ SqlCTSP
            $result = $this->sqlCTSP->getCTSP($masp, $mau, $dungluong);
            return $result;  // Trả về kết quả từ SqlCTSP
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in getCTSP: ' . $e->getMessage());
            throw new Exception('Không thể lấy chi tiết CTSP. Vui lòng thử lại sau.');
        }
    }

    /**
     * Cập nhật CTSP
     */
    public function updateCTSP(Request $request, string $masp, string $dungluong, string $mau)
    {
        try {
            // Kiểm tra thông tin đầu vào
            if (empty($masp) || empty($dungluong) || empty($mau)) {
                throw new Exception('Mã sản phẩm, dung lượng hoặc màu không được để trống.');
            }

            // Gọi hàm updateCTSP từ SqlCTSP
            $result = $this->sqlCTSP->updateCTSP($request, $masp, $dungluong, $mau);
            if (!$result) {
                throw new Exception('Không có thông tin nào được cập nhật.');
            }

            return $result;  // Trả về kết quả từ SqlCTSP
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in updateCTSP: ' . $e->getMessage());
            throw new Exception('Không thể cập nhật CTSP. Vui lòng thử lại sau.');
        }
    }

    /**
     * Xóa CTSP
     */
    public function deleteCTSP(string $masp, string $dungluong, string $mau)
    {
        try {
            // Kiểm tra thông tin đầu vào
            if (empty($masp) || empty($dungluong) || empty($mau)) {
                throw new Exception('Mã sản phẩm, dung lượng hoặc màu không được để trống.');
            }

            // Gọi hàm deleteCTSP từ SqlCTSP
            $result = $this->sqlCTSP->deleteCTSP($masp, $dungluong, $mau);
            if (!$result) {
                throw new Exception('Không thể xóa CTSP. Vui lòng kiểm tra thông tin.');
            }

            return $result;  // Trả về kết quả từ SqlCTSP
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo phù hợp
            Log::error('Error in deleteCTSP: ' . $e->getMessage());
            throw new Exception('Không thể xóa CTSP. Vui lòng thử lại sau.');
        }
    }
}
