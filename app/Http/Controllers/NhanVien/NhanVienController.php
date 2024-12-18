<?php

namespace App\Http\Controllers\NhanVien;

use App\Business\FunctionBiz\FunctionBusiness;
use App\Business\NhanVienBiz\NhanVienBusiness;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Nhan Vien Controller
 * 
 * @auth: Vo Duc Trung
 */

class NhanVienController extends Controller
{
   /* Nhan Vien Business */
   protected NhanVienBusiness $nhanVienBusiness;

   /* FunctionBusiness */
   protected FunctionBusiness $functionBusiness;

   /**
    * Constructor
    */
   public function __construct()
   {
      $this->nhanVienBusiness = new NhanVienBusiness();
      $this->functionBusiness = new FunctionBusiness();
   }

   /**
    * Kiểm tra quyền truy cập của người dùng
    */
   protected function checkPermission($functionname, $permission)
   {
      $NhanVien = Auth::user();
      $Manv = $NhanVien->manv;
      return $this->functionBusiness->getFunctionWithPermissions($functionname, $Manv, $permission);
   }

   /**
    * Lấy thông tin tất cả nhân viên
    */
   public function getInfoNhanVien(Request $request)
   {
      try {
         if (!$this->checkPermission("Employee Management", "xem")) {
            return response()->json([
               'message' => "Bạn không có quyền truy cập thông tin nhân viên"
            ], 403); // 403 Forbidden
         }

         $NhanViens = $this->nhanVienBusiness->getAllNhanVien($request);
         return response()->json($NhanViens);
      } catch (Exception $e) {
         return response()->json([
            'message' => "Đã có lỗi xảy ra",
            'error' => $e->getMessage()
         ], 500); // 500 Internal Server Error
      }
   }

   /**
    * Tìm kiếm thông tin nhân viên
    */
   public function getNhanVien(Request $request)
   {
      try {
         if (!$this->checkPermission("Employee Management", "xem")) {
            return response()->json([
               'message' => "Bạn không có quyền truy cập thông tin nhân viên"
            ], 403); // 403 Forbidden
         }

         $NhanViens = $this->nhanVienBusiness->searchNhanVien($request);
         return response()->json($NhanViens);
      } catch (Exception $e) {
         return response()->json([
            'message' => "Đã có lỗi xảy ra",
            'error' => $e->getMessage()
         ], 500); // 500 Internal Server Error
      }
   }

   /**
    * Cập nhật thông tin nhân viên
    */
   public function updateNhanVien(Request $request)
   {
      try {
         if (!$this->checkPermission("Employee Management", "sửa")) {
            return response()->json([
               'message' => "Bạn không có quyền cập nhật thông tin nhân viên"
            ], 403); // 403 Forbidden
         }

         $result = $this->nhanVienBusiness->updateNhanVien($request);

         if ($result === false) {
            return response()->json([
               'message' => 'Cập nhật thông tin nhân viên không thành công.'
            ], 500); // 500 Internal Server Error
         }

         return response()->json($result);
      } catch (Exception $e) {
         return response()->json([
            'message' => "Đã có lỗi xảy ra",
            'error' => $e->getMessage()
         ], 500); // 500 Internal Server Error
      }
   }

   /**
    * Xóa thông tin nhân viên
    */
   public function deleteNhanVien(Request $request)
   {
      try {
         if (!$this->checkPermission("Employee Management", "xóa")) {
            return response()->json([
               'message' => "Bạn không có quyền xóa thông tin nhân viên"
            ], 403); // 403 Forbidden
         }

         $result = $this->nhanVienBusiness->deleteNhanVien($request);

         if ($result === false) {
            return response()->json([
               'message' => 'Xóa nhân viên không thành công.'
            ], 500); // 500 Internal Server Error
         }

         return response()->json($result);
      } catch (Exception $e) {
         return response()->json([
            'message' => "Đã có lỗi xảy ra",
            'error' => $e->getMessage()
         ], 500); // 500 Internal Server Error
      }
   }
}
