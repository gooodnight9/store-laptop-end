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
        $sodienthoainhanhang = $request->input('sodienthoai');
        $diachinhanhang = $request->input('diachi', null);
        $trangthaidonhang = $request->input('trangthai');
        try {
            // Chèn sản phẩm mới vào giỏ hàng
            // Chèn sản phẩm mới vào giỏ hàng và lấy mã đơn hàng vừa được tạo
            $donhangId = DB::table('donhang')->insertGetId([
                'ngaydathang' => $ngaydathang,
                'trangthaidonhang' => $trangthaidonhang,
                'makm' => null,
                'makh' => $makh,
                'diachinhanhang' => $diachinhanhang,
                'sodienthoainhanhang' => $sodienthoainhanhang,
            ]);
            // Ghi thông tin vào log khi đơn hàng được tạo thành công
            Log::info('Đơn hàng được tạo thành công', [
                'donhang_id' => $donhangId,
                'ngaydathang' => $ngaydathang,
                'makh' => $makh,
                'trangthaidonhang' => $trangthaidonhang,
                'diachinhanhang' => $diachinhanhang,
                'sodienthoainhanhang' => $sodienthoainhanhang,
            ]);

            return  $donhangId;
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
