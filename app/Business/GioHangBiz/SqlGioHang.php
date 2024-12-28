<?php

namespace App\Business\GioHangBiz;

use App\Models\giohang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SqlGioHang
{
    // Thêm giỏ hàng
    public function createGioHang(Request $request, $makh)
    {
        $masp = $request->input('masp');
        $soluong = $request->input('soluong', 1);
        $mactsp = $request->input('mactsp');
        try {
            // kiểm tra các tham số đầu vào 
            if (!is_numeric($masp) || !is_numeric($soluong) || $soluong <= 0) {
                return response()->json(['message' => "Thông tin sản phẩm hoặc số lượng không hợp lệ"], 404);
            }

            $giohang = giohang::where('makh', $makh)->where('masp', $masp)->first();
            if ($giohang) {
                // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng sản phẩm
                $giohang->soluong += $soluong;
                $giohang->save();
                return response()->json(['message' => 'Sản phẩm đã được cập nhật vào giỏ hàng.'], 200);
            }
            // Chèn sản phẩm mới vào giỏ hàng
            DB::table('giohang')->insert([
                'masp' => $masp,
                'soluong' => $soluong,
                'makh' => $makh,
                'mactsp' => $mactsp,
            ]);

            return response()->json(['message' => 'Giỏ hàng được tạo thành công.'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Lỗi khi tạo giỏ hàng.', 'error' => $e->getMessage()], 500);
        }
    }

    // Lấy tất cả giỏ hàng
    public function getAllGioHang($makh): array
    {
        try {
            // Query
            $query =
                "select gh.magh , gh.masp , gh.mactsp , tensanpham , giaban , soluong " .
                "from giohang gh " .
                "left join sanpham sp on sp.masp = gh.masp " .
                "where makh = :makh ";

            // Thực thi câu lệnh SQL với các tham số
            $gioHangs = DB::select($query, [
                'makh' => $makh,
            ]);

            return $gioHangs;
        } catch (\Exception $e) {
            Log::error("Error fetching carts: " . $e->getMessage());
            return [];
        }
    }

    // Cập nhật giỏ hàng
    public function updateGioHang(Request $request, $magh): bool
    {
        $data = $request->only(['masp', 'soluong', 'makh']);
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        if (empty($filteredData)) {
            return false;
        }

        try {
            DB::table('giohang')
                ->where('magh', $magh)
                ->update($filteredData);

            return true;
        } catch (\Exception $e) {
            Log::error("Error updating cart: " . $e->getMessage());
            return false;
        }
    }

    // Xóa giỏ hàng
    public function deleteGioHang($magh): bool
    {
        try {
            DB::table('giohang')->where('magh', $magh)->delete();
            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting cart: " . $e->getMessage());
            return false;
        }
    }
}
