<?php

namespace App\Business\FunctionBiz;

use App\Business\FunctionBiz\SqlFunction;
use Exception;

/**
 * Function and Permission Business
 * 
 * @auth Nguyen Minh Nhut
 */
class FunctionBusiness
{
    protected SqlFunction $sqlFunction;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sqlFunction = new SqlFunction();
    }

    /**
     * Get Function and Permission
     * 
     * @param string $FunctionName Tên chức năng cần tìm
     * @param int $NhanVien_id ID của nhân viên
     * 
     * @return array Thông tin chức năng và quyền liên quan
     */
    public function getFunctionWithPermissions(string $FunctionName, int $NhanVien_id, string $PermissionName): array
    {
        try {
            $result = $this->sqlFunction->getFunctionWithPermissions($FunctionName, $NhanVien_id, $PermissionName);
        } catch (Exception $e) {
        }

        return $result;
    }
}
