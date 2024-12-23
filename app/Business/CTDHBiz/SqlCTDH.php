<?php

namespace App\Business\CTDHBiz;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SqlCTDH
{
    // Thêm chi tiết đơn hàng
    public function createCTDH(Request $request)
    {
        $madh = $request->input('madh');
        $masp = $request->input('masp');
        $soluong = $request->input('soluong');
        $mabh = $request->input('mabh', null);

        try {
            // Kiểm tra sản phẩm có tồn tại
            $sanPham = SanPham::where('masp', $masp)->first();
            if (!$sanPham) {
                return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
            }

            // Tính giá bán
            $giaban = $sanPham->giaban * $soluong;

            // Chèn sản phẩm mới vào chi tiết đơn hàng
            DB::table('ctdh')->insert([
                'madh' => $madh,
                'masp' => $masp,
                'soluong' => $soluong,
                'giaban' => $giaban,
                'mabh' => $mabh
            ]);

            return response()->json(['message' => 'CTDH được tạo thành công.'], 201);
        } catch (\Exception $e) {
            Log::error("Error creating CTDH: " . $e->getMessage());
            return response()->json(['message' => 'Lỗi khi tạo CTDH.', 'error' => $e->getMessage()], 500);
        }
    }

    // Lấy tất cả chi tiết đơn hàng
    public function getAllCTDH(Request $request, $madh): array
    {
        $page = (int) $request->input('page', 1);
        $perPage = (int) $request->input('perPage', 10);
        $offset = ($page - 1) * $perPage;

        try {
            $CTDHs = DB::table('ctdh')
                ->where('madh', '=', $madh)  // So sánh cột 'madh' với giá trị $madh
                ->offset($offset)
                ->limit($perPage)
                ->get();

            return $CTDHs->toArray();
        } catch (\Exception $e) {
            Log::error("Error fetching CTDH: " . $e->getMessage());
            return [];
        }
    }

    // Cập nhật chi tiết đơn hàng
    public function updateCTDH(Request $request, $madh, $masp): bool
    {
        $data = $request->only(['soluong', 'giaban', 'mabh']);
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        if (empty($filteredData)) {
            return false;
        }

        try {
            DB::table('ctdh')
                ->where('madh', $madh)
                ->where('masp', $masp)
                ->update($filteredData);

            return true;
        } catch (\Exception $e) {
            Log::error("Error updating CTDH: " . $e->getMessage());
            return false;
        }
    }

    // Xóa chi tiết đơn hàng
    public function deleteCTDH($madh, $masp): bool
    {
        try {
            DB::table('ctdh')
                ->where('madh', $madh)
                ->where('masp', $masp)
                ->delete();

            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting CTDH: " . $e->getMessage());
            return false;
        }
    }
}
