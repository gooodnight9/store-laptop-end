<?php

namespace  App\Business\NhanVienBiz;

use Illuminate\Support\Facades\DB;

/**
 * Sql Nhan Vien Business
 * 
 */
class SqlNhanVien
{
    //Get All NhanVien
    public function getAllNhanVien(): array
    {
        // Query
        $query =
            "SELECT * " .
            "FROM nhanvien";

        // Thực thi câu lệnh SQL và trả về kết quả
        $NhanViens = DB::select($query);

        return $NhanViens;
    }
}
