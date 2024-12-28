<?php

namespace App\Business\GioHangBiz;

use App\Business\GioHangBiz\SqlGioHang;
use Exception;
use Illuminate\Http\Request;

/**
 * Prommotion Business
 * 
 * @auth Vo Duc Trung
 */

class GioHangBusiness
{
    protected SqlGioHang $sqlGioHang;

    public function __construct()
    {
        $this->sqlGioHang = new sqlGioHang();
    }


    /**
     * Post create Product
     */

    public function createGioHang(Request $request, $makh)
    {
        try {
            $result = $this->sqlGioHang->createGioHang($request, $makh);
        } catch (Exception $e) {
        }
        return $result;
    }


    /**
     * Get All Employee
     */

    public function getAllGioHang($makh): array
    {
        try {
            $result = $this->sqlGioHang->getAllGioHang($makh);
        } catch (Exception $e) {
        }
        return $result;
    }

    /**
     * Put Update Product
     */

    public function updateGioHang(Request $request, string $masp)
    {
        try {
            return $this->sqlGioHang->updateGioHang($request, $masp);
        } catch (Exception $e) {
        }
    }

    /**
     * Delete employee
     */
    public function deleteGioHang($magh)
    {
        try {
            return $this->sqlGioHang->deleteGioHang($magh);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
