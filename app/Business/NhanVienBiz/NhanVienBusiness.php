<?php

namespace App\Business\NhanVienBiz;

use Exception;
use Illuminate\Http\Request;

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
     * Get All Employee
     */

    public function getAllNhanVien(Request $request): array
    {
        try {
            $page = $request->input('page', 1);
            $perPage = $request->input('perPage', 10);
            $result = $this->sqlNhanVien->getAllNhanVien($perPage, $page);
        } catch (Exception $e) {
        }
        return $result;
    }

    /**
     * Get  Employee
     */

    public function searchNhanVien(Request $request): array
    {
        try {
            $searchTerm = $request->input('searchTerm', ''); // Lấy từ request, mặc định là rỗng
            $page = $request->input('page', 1);      // Lấy trang từ request, mặc định là trang 1
            $perPage = $request->input('perPage', 10); // Lấy số mục mỗi trang, mặc định là 10

            return $this->sqlNhanVien->searchNhanVienWithPagination($searchTerm, $page, $perPage);
        } catch (Exception $e) {
        }
    }

    /**
     * Update employee
     */
    public function updateNhanVien(Request $request)
    {
        try {
            $data = $request->all(); // Lấy tất cả dữ liệu từ request

            return $this->sqlNhanVien->updateNhanVien($data);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }

    /**
     * Delete employee
     */
    public function deleteNhanVien($manv)
    {
        try {
            return $this->sqlNhanVien->deleteNhanVien($manv);
        } catch (Exception $e) {
            // Handle exception
            return false;
        }
    }
}
