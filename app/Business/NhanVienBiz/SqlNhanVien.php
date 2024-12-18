<?php

namespace  App\Business\NhanVienBiz;

use App\Models\nhanvien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Sql Nhan Vien Business
 * 
 */
class SqlNhanVien
{
    //Get All NhanVien
    public function getAllNhanVien($perPage = 10, $page = 1): array
    {
        // Tính toán offset dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;

        // Query
        $query =
            "SELECT * " .
            "FROM nhanvien " .
            "LIMIT :perPage OFFSET :offset";


        // Thực thi câu lệnh SQL với các tham số phân trang
        $NhanViens = DB::select($query, [
            'perPage' => $perPage,
            'offset' => $offset
        ]);

        return $NhanViens;
    }

    // Tìm kiếm nhân viên và phân trang 
    public function searchNhanVienWithPagination($searchTerm, $page = 1, $perPage = 10)
    {
        // Tính toán offset cho phân trang
        $offset = ($page - 1) * $perPage;

        // Query SQL
        $query =
            "SELECT *" .
            "FROM nhanvien " .
            "WHERE hovaten LIKE :hovaten " .
            "OR sodienthoai LIKE :sodienthoai " .
            "OR macn = :macn " .
            "OR manv = :manv " .
            "ORDER BY manv " .
            "LIMIT :offset, :perPage ";

        // Thực thi câu lệnh SQL và trả về kết quả
        $NhanViens = DB::select($query, [
            'hovaten' => '%' . $searchTerm . '%',
            'sodienthoai' => '%' . $searchTerm . '%',
            'macn' => $searchTerm,
            'manv' => $searchTerm,
            'offset' => $offset,
            'perPage' => $perPage
        ]);

        return $NhanViens;
    }

    // Cập nhật thông tin nhân viên
    public function updateNhanVien($data)
    {
        try {
            // Tìm nhân viên theo manv
            $nhanVien = nhanvien::find($data['manv']);

            if (!$nhanVien) {
                return false; // Nếu không tìm thấy nhân viên
            }

            // Cập nhật các trường thông tin của nhân viên
            $nhanVien->hovaten = $data['hovaten'];
            $nhanVien->ngaysinh = $data['ngaysinh'];
            $nhanVien->diachi = $data['diachi'];
            $nhanVien->sodienthoai = $data['sodienthoai'];
            $nhanVien->email = $data['email'];
            $nhanVien->role_id = $data['role_id'];
            $nhanVien->macn = $data['macn'];

            // Lưu thay đổi vào cơ sở dữ liệu
            $nhanVien->save();

            return true;
        } catch (\Exception $e) {
            // Ghi log lỗi nếu có
            Log::error("Error updating employee: " . $e->getMessage());
            return false;
        }
    }


    // Xóa nhân viên theo mã nhân viên
    public function deleteNhanVien($manv)
    {
        // Xây dựng câu lệnh SQL
        $query = "DELETE FROM nhanvien WHERE manv = :manv";

        // Thực thi câu lệnh SQL
        try {
            DB::delete($query, ['manv' => $manv]);
            return true;
        } catch (\Exception $e) {
            Log::error("Error deleting employee: " . $e->getMessage());
            return false;
        }
    }
}
