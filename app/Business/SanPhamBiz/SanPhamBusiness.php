<?php

namespace App\Business\SanPhamBiz;

use App\Business\SanPhamBiz\SqlSanPham;
use Exception;
use Illuminate\Http\Request;

/**
 * Students Business
 * 
 * @auth Vo Duc Trung
 */

class SanPhamBusiness
{
    protected SqlSanPham $sqlSanPham;

    public function __construct()
    {
        $this->sqlSanPham = new sqlSanPham();
    }


    /**
     * Post create Product
     */

    public function createSanPham(Request $request)
    {
        try {
            $result = $this->sqlSanPham->createSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }


    /**
     * Get All Employee
     */

    public function getAllSanPham(Request $request): array
    {
        try {
            $result = $this->sqlSanPham->getAllSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }

    public function getSanPham(Request $request): array
    {
        try {
            $result = $this->sqlSanPham->getSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }

    /**
     * Get All Employee
     */

    public function getTopRatedSanPham(Request $request): array
    {
        try {
            $result = $this->sqlSanPham->getTopRatedSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }


    public function getTopPromoSanPham(Request $request): array
    {
        try {
            $result = $this->sqlSanPham->getTopPromoSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }

    public function getTopSalesSanPham(Request $request): array
    {
        try {
            $result = $this->sqlSanPham->getTopSalesSanPham($request);
        } catch (Exception $e) {
        }
        return $result;
    }
    /**
     * Put Update Product
     */

    public function updateSanPham(Request $request, string $masp)
    {
        try {
            return $this->sqlSanPham->updateSanPham($request, $masp);
        } catch (Exception $e) {
        }
    }

    /**
     * Delete employee
     */
    public function deleteSanPham($masp)
    {
        try {
            return $this->sqlSanPham->deleteSanPham($masp);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
