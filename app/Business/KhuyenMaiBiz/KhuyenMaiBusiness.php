<?php

namespace App\Business\KhuyenMaiBiz;

use App\Business\KhuyenMaiBiz\SqlKhuyenMai;
use Exception;
use Illuminate\Http\Request;

/**
 * Prommotion Business
 * 
 * @auth Vo Duc Trung
 */

class KhuyenMaiBusiness
{
    protected SqlKhuyenMai $sqlKhuyenMai;

    public function __construct()
    {
        $this->sqlKhuyenMai = new sqlKhuyenMai();
    }


    /**
     * Post create Product
     */

    public function createKhuyenMai(Request $request)
    {
        try {
            $result = $this->sqlKhuyenMai->createKhuyenMai($request);
        } catch (Exception $e) {
        }
        return $result;
    }


    /**
     * Get All Employee
     */

    public function getAllKhuyenMai(Request $request): array
    {
        try {
            $result = $this->sqlKhuyenMai->getAllKhuyenMai($request);
        } catch (Exception $e) {
        }
        return $result;
    }

    /**
     * Put Update Product
     */

    public function updateKhuyenMai(Request $request, string $masp)
    {
        try {
            return $this->sqlKhuyenMai->updateKhuyenMai($request, $masp);
        } catch (Exception $e) {
        }
    }

    /**
     * Delete employee
     */
    public function deleteKhuyenMai($masp)
    {
        try {
            return $this->sqlKhuyenMai->deleteKhuyenMai($masp);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
