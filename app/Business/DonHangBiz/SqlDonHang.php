<?php

namespace App\Business\DonHangBiz;

use App\Models\DonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SqlDonHang
{
    // Thêm giỏ hàng
    public function createDonHang(Request $request, $makh)
    {
        $ngaydathang = $request->input('ngaydathang');
        $trangthaidonhang = "Đơn hàng đang tạo";
        try {
            // Chèn sản phẩm mới vào giỏ hàng
            DB::table('donhang')->insert([
                'ngaydathang' => $ngaydathang,
                'trangthaidonhang' => $trangthaidonhang,
                'makm' => null,
                'makh' => $makh,
            ]);

            return response()->json(['message' => 'Đơn hàng được tạo thành công.'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi tạo đơn hàng.', 'error' => $e->getMessage()], 500);
        }
    }

    // Lấy tất cả giỏ hàng
    public function getAllDonHang(Request $request, $makh): array
    {
        $page = (int) $request->input('page', 1);
        $perPage = (int) $request->input('perPage', 10);
        $offset = ($page - 1) * $perPage;

        try {
            $DonHangs = DB::table('donhang')
                ->where('makh', '=', $makh)  // So sánh cột 'makh' với giá trị $makh
                ->offset($offset)
                ->limit($perPage)
                ->get();

            return $DonHangs->toArray();
        } catch (\Exception $e) {
            Log::error("Error fetching carts: " . $e->getMessage());
            return [];
        }
    }

    // Cập nhật giỏ hàng
    public function updateDonHang(Request $request, $madh): bool
    {
        $data = $request->only(['trangthaidonhang', 'makm']);
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        if (empty($filteredData)) {
            return false;
        }

        try {
            DB::table('donhang')
                ->where('madh', $madh)
                ->update($filteredData);

            return true;
        } catch (\Exception $e) {
            Log::error("Error updating cart: " . $e->getMessage());
            return false;
        }
    }

    // Xóa giỏ hàng
    public function deleteDonHang($madh): bool
    {
        try {
            DB::table('donhang')->where('madh', $madh)->delete();
            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting cart: " . $e->getMessage());
            return false;
        }
    }
}
