<?php

namespace App\Http\Controllers\SinhVien;

use App\Business\FunctionBiz\FunctionBusiness;
use App\Business\NhanVienBiz\NhanVienBusiness;
use App\Http\Controllers\Controller;
use Exception;
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
    * Contructor
    */

   public function __construct()
   {
      $this->nhanVienBusiness = new NhanVienBusiness();
      $this->functionBusiness = new FunctionBusiness();
   }

   public function getInfoNhanVien()
   {
      try {
         //Kiểm trea quyền của người dùng
         $NhanVien = Auth::user();
         $Manv = $NhanVien->manv;
         $functionname = "Employee Management";
         $permission = "xem";

         //Truy vấn kiểm tra quyền
         $function = $this->functionBusiness->getFunctionWithPermissions($functionname, $Manv, $permission);

         if ($function) {
            //Người dùng có quyền "Xem nhân viên", trả về thông tin nhân viên
            $NhanViens = $this->nhanVienBusiness->getAllNhanVien();
            return response()->json($NhanViens);
         } else {
            // Người dùng không có quyền truy cập thông tin nhân viên 
            return response()->json([
               'message' => "Bạn không có quyền truy cập thông tin nhân viên"
            ], 403); // 403 Forbidden
         }
      } catch (Exception $e) {
         // Xử lí lỗi nếu có 
         return response()->json([
            'message' => "Đã có lỗi xảy ra",
            'error' => $e->getMessage()
         ], 500); // 500 Internal Server Error

      }
   }
}
