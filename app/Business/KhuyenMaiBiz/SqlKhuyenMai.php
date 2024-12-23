<?php

namespace App\Business\KhuyenMaiBiz;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\KhuyenMai;

class SqlKhuyenMai
{
    public function createKhuyenMai(Request $request)
    {
        // Lấy các tham số từ request, bỏ qua nếu giá trị là null
        $loaikm = $request->input('loaikm');
        $sotienkm = $request->input('sotienkm');
        $ngaybatdau = $request->input('ngaybatdau');
        $ngaykethuc = $request->input('ngaykethuc');
        $dieukien = $request->input('dieukien');

        // Chỉ giữ lại các cặp key-value không null
        $data = array_filter([
            'loaikm' => $loaikm,
            'sotienkm' => $sotienkm,
            'ngaybatdau' => $ngaybatdau,
            'ngaykethuc' => $ngaykethuc,
            'dieukien' => $dieukien,
        ], function ($value) {
            return !is_null($value);
        });

        // Kiểm tra nếu không có dữ liệu hợp lệ
        if (empty($data)) {
            return response()->json([
                'message' => 'Dữ liệu không hợp lệ hoặc thiếu thông tin.',
            ], 400); // HTTP 400 Bad Request
        }

        try {
            // Thêm bản ghi vào cơ sở dữ liệu
            $id = DB::table('khuyenmai')->insertGetId($data);

            // Trả về phản hồi thành công
            return response()->json([
                'message' => 'Khuyến mãi được tạo thành công.',
                'makm' => $id,
            ], 201); // HTTP 201 Created
        } catch (\Exception $e) {
            // Xử lý lỗi
            return response()->json([
                'message' => 'Có lỗi xảy ra khi tạo khuyến mãi.',
                'error' => $e->getMessage(),
            ], 500); // HTTP 500 Internal Server Error
        }
    }


    // Lấy tất cả khuyến mãi
    public function getAllKhuyenMai(Request $request): array
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 10);

        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Lấy các tham số lọc từ request
        $loaikm = $request->input('loaikm', '%');
        $sotienkm = $request->input('sotienkm', '%');
        $ngaybatdau = $request->input('ngaybatdau', '%');
        $ngaykethuc = $request->input('ngaykethuc', '%');

        // Query
        $query =
            "SELECT * " .
            "FROM khuyenmai " .
            "WHERE LOWER(loaikm) LIKE CONCAT('%', LOWER(:loaikm), '%') " .
            "OR sotienkm LIKE CONCAT('%', :sotienkm, '%') " .
            "OR ngaybatdau LIKE CONCAT('%', :ngaybatdau, '%') " .
            "OR ngaykethuc LIKE CONCAT('%', :ngaykethuc, '%') " .
            "ORDER BY ngaybatdau " .
            "LIMIT :offset, :perPage";

        // Thực thi câu lệnh SQL với các tham số
        $KhuyenMais = DB::select($query, [
            'loaikm' => $loaikm,
            'sotienkm' => $sotienkm,
            'ngaybatdau' => $ngaybatdau,
            'ngaykethuc' => $ngaykethuc,
            'offset' => $offset,
            'perPage' => $perPage,
        ]);

        return $KhuyenMais;
    }

    // Cập nhật thông tin khuyến mãi
    public function updateKhuyenMai(Request $request, $makm): bool
    {
        // Lấy thông tin cần cập nhật từ request
        $data = [
            'loaikm' => $request->input('loaikm'),
            'sotienkm' => $request->input('sotienkm'),
            'ngaybatdau' => $request->input('ngaybatdau'),
            'ngaykethuc' => $request->input('ngaykethuc'),
            'dieukien' => $request->input('dieukien'),
        ];

        // Loại bỏ các giá trị null để tránh lỗi SQL
        $filteredData = array_filter($data, fn($value) => !is_null($value));

        // Tạo câu lệnh SQL động
        $setClause = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($filteredData)));

        // Câu lệnh SQL
        $query = "UPDATE khuyenmai SET $setClause WHERE makm = :makm";

        // Thêm `makm` vào tham số
        $filteredData['makm'] = $makm;

        // Thực thi câu lệnh
        $affectedRows = DB::update($query, $filteredData);

        return $affectedRows > 0;
    }

    // Xóa khuyến mãi theo mã khuyến mãi
    public function deleteKhuyenMai($makm): bool
    {
        // Câu lệnh SQL xóa khuyến mãi
        $query = "DELETE FROM khuyenmai WHERE makm = :makm";

        // Thực thi câu lệnh SQL
        try {
            DB::delete($query, ['makm' => $makm]);
            return true; // Trả về true nếu xóa thành công
        } catch (\Exception $e) {
            Log::error("Error deleting promotion: " . $e->getMessage()); // Ghi log nếu xảy ra lỗi
            return false; // Trả về false nếu xảy ra lỗi
        }
    }
}
