<?php

namespace App\Business\DonHangBiz;

use App\Business\DonHangBiz\SqlDonHang;
use Exception;
use Illuminate\Http\Request;

/**
 * Prommotion Business
 * 
 * @auth Vo Duc Trung
 */

class DonHangBusiness
{
    protected SqlDonHang $sqlDonHang;

    public function __construct()
    {
        $this->sqlDonHang = new sqlDonHang();
    }


    /**
     * Post create Product
     */

    public function createDonHang(Request $request, $makh)
    {
        try {
            $result = $this->sqlDonHang->createDonHang($request, $makh);
        } catch (Exception $e) {
        }
        return $result;
    }


    /**
     * Get All Employee
     */

    public function getAllDonHang(Request $request, $makh): array
    {
        try {
            $result = $this->sqlDonHang->getAllDonHang($request, $makh);
        } catch (Exception $e) {
        }
        return $result;
    }

    /**
     * Put Update Product
     */

    public function updateDonHang(Request $request, string $madh)
    {
        try {
            return $this->sqlDonHang->updateDonHang($request, $madh);
        } catch (Exception $e) {
        }
    }

    /**
     * Delete employee
     */
    public function deleteDonHang($madh)
    {
        try {
            return $this->sqlDonHang->deleteDonHang($madh);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
