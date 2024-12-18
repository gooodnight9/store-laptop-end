<?php

namespace App\Business\FunctionBiz;

use Illuminate\Support\Facades\DB;

/**
 * Sql Permission
 * 
 * @auth: Vo Duc Trung
 */
class SqlFunction
{
    // Get All Students
    public function getFunctionWithPermissions(string $FunctionName, int $NhanVien_id, string $PermissionName): array
    {
        // Query
        $query =
            "SELECT f.functionname, p.permission_name " .
            "FROM nhanvien nv " .
            "JOIN role r ON nv.role_id = r.id " .
            "JOIN role_permission_function rpf ON r.id = rpf.role_id " .
            "JOIN functions f ON rpf.function_id = f.id " .
            "JOIN permission p ON rpf.permission_id = p.id " .
            "WHERE nv.manv = :manv " .
            "AND f.functionname = :functionname " .
            "AND p.permission_name = :permissionname";


        // Bindings cho các tham số
        $bindings = [
            'manv' => $NhanVien_id,
            'functionname' => $FunctionName,
            'permissionname' => $PermissionName,
        ];

        // Thực thi câu lệnh SQL và trả về kết quả
        $result = DB::select($query, $bindings);

        return $result;
    }
}
