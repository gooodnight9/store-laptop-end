<?php

namespace App\Business\NhanVienBiz;

use Exception;

/**
 * Students Business
 * 
 * @auth Vo Duc Trung
 */

class NhanVienBusiness
{
    protected SqlNhanVien $sqlNhanVien;

    public function __construct()
    {
        $this->sqlNhanVien = new SqlNhanVien();
    }

    /**
     * Get All Students
     */

    public function getAllNhanVien(): array
    {
        try {
            $result = $this->sqlNhanVien->getAllNhanVien();
        } catch (Exception $e) {
        }
        return $result;
    }
}
