<?php

namespace App\Business\CTSPBiz;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SqlCTSP
{
    // Thêm chi tiết đơn hàng
    public function createCTSP(Request $request)
    {
        $masp = $request->input('masp');
        $dungluong = $request->input('dungluong');
        $mau = $request->input('mau');
        $phantramtang = $request->input('phantramtang', 0);

        try {
            // Chèn sản phẩm mới vào chi tiết đơn hàng
            DB::table('ctsp')->insert([
                'masp' => $masp,
                'dungluong' => $dungluong,
                'mau' => $mau,
                'phantramtang' => $phantramtang
            ]);

            return response()->json(['message' => 'CTSP được tạo thành công.'], 201);
        } catch (\Exception $e) {
            Log::error("Error creating CTSP: " . $e->getMessage());
            return response()->json(['message' => 'Lỗi khi tạo CTSP.', 'error' => $e->getMessage()], 500);
        }
    }

    // Cập nhật chi tiết đơn hàng
    public function updateCTSP(Request $request, $madh, $masp): bool
    {
        $data = $request->only(['soluong', 'giaban', 'mabh']);
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        if (empty($filteredData)) {
            return false;
        }

        try {
            DB::table('ctsp')
                ->where('madh', $madh)
                ->where('masp', $masp)
                ->update($filteredData);

            return true;
        } catch (\Exception $e) {
            Log::error("Error updating CTSP: " . $e->getMessage());
            return false;
        }
    }

    // Xóa chi tiết đơn hàng
    public function deleteCTSP($madh, $masp): bool
    {
        try {
            DB::table('ctsp')
                ->where('madh', $madh)
                ->where('masp', $masp)
                ->delete();

            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting CTSP: " . $e->getMessage());
            return false;
        }
    }

    // Lấy chi tiết sản phẩm (CTSP) theo masp, mau, dungluong
    public function getCTSP($masp, $mau, $dungluong)
    {
        try {
            $ctsp = DB::table('ctsp')
                ->where('masp', $masp)
                ->where('mau', $mau)
                ->where('dungluong', $dungluong)
                ->first(); // Lấy 1 bản ghi đầu tiên thỏa mãn điều kiện


            if ($ctsp) {
                return response()->json(['ctsp' => $ctsp], 200);
            } else {
                return response()->json(['message' => 'Không tìm thấy chi tiết sản phẩm.'], 404);
            }
        } catch (\Exception $e) {
            Log::error("Error fetching CTSP: " . $e->getMessage());
            return response()->json(['message' => 'Lỗi khi lấy chi tiết sản phẩm.', 'error' => $e->getMessage()], 500);
        }
    }
}
