<?php

namespace App\Http\Controllers;

use App\Models\admin_account;
use App\Models\nhanvien;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Đăng ký nhân viên mới
    public function register(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'hovaten' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email', // Email phải duy nhất trong bảng nhân viên
            'ngaysinh' => 'required|date|before:today',
            'password' => 'required|string|min:6|confirmed',
            'diachi' => 'nullable|string|max:255',
            'sodienthoai' => 'nullable|string|max:20',
            'role_id' => 'required|exists:role,id', // Phải tồn tại trong bảng role
            'macn' => 'required|exists:chinhanh,macn', // Phải tồn tại trong bảng chi nhánh
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Tạo nhân viên mới
        $nhanvien = nhanvien::create([
            'hovaten' => $request->hovaten,
            'ngaysinh' => $request->ngaysinh,
            'diachi' => $request->diachi,
            'sodienthoai' => $request->sodienthoai,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'macn' => $request->macn,
        ]);

        // Kiểm tra role_id để lưu thông tin tài khoản vào bảng phù hợp
        if ($request->role_id === 1) { // Giả sử role_id = 1 là admin
            admin_account::create([
                'manv' => $nhanvien->manv,
                'usernameadmin' => $request->email,
                'passwordadmin' => Hash::make($request->password),
            ]);
        } else {
            account::create([
                'manv' => $nhanvien->manv,
                'password' => Hash::make($request->password),
            ]);
        }

        // Tạo token khi đăng ký thành công
        $token = $nhanvien->createToken('YourAppName')->plainTextToken;

        return response()->json([
            'token' => $token,
            'message' => 'Nhân viên đăng ký thành công',
        ], 201);
    }

    // Đăng nhập
    public function login(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Tìm nhân viên dựa trên email
        $nhanvien = nhanvien::where('email', $request->email)->first();

        if (!$nhanvien) {
            return response()->json(['message' => 'Email không tồn tại'], 404);
        }

        // Tìm tài khoản trong bảng `account`
        $account = account::where('manv', $nhanvien->manv)->first();

        if (!$account || !Hash::check($request->password, $account->password)) {
            return response()->json(['message' => 'Thông tin đăng nhập nhân viên không hợp lệ'], 401);
        }

        // Tạo token cho nhân viên
        $token = $nhanvien->createToken('NhanVienApp')->plainTextToken;

        return response()->json([
            'token' => $token,
            'message' => 'Đăng nhập nhân viên thành công',
        ], 200);
    }


    public function loginAdmin(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email', // Kiểm tra định dạng email
            'password' => 'required|string', // Mật khẩu không được để trống
        ]);

        // Nếu validate thất bại, trả về lỗi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Tìm tài khoản admin theo email
        $adminAccount = admin_account::where('usernameadmin', $request->email)->first();

        // Nếu không tìm thấy tài khoản hoặc mật khẩu không khớp
        if (!$adminAccount) {
            return response()->json(['message' => 'Tên đăng nhập không tồn tại'], 404);
        }

        if (!Hash::check($request->password, $adminAccount->passwordadmin)) {
            return response()->json(['message' => 'Mật khẩu không chính xác'], 401);
        }

        // Lấy thông tin nhân viên tương ứng
        $nhanvien = nhanvien::find($adminAccount->manv);

        if (!$nhanvien) {
            return response()->json(['message' => 'Thông tin nhân viên không tồn tại'], 404);
        }

        // Tạo token cho admin
        $token = $nhanvien->createToken('AdminApp')->plainTextToken;

        return response()->json([
            'token' => $token,
            'message' => 'Đăng nhập admin thành công',
            'user' => $nhanvien, // Trả thêm thông tin nhân viên (nếu cần)
        ], 200);
    }



    // Lấy thông tin nhân viên đã đăng nhập
    public function nhanvien(Request $request)
    {
        // Trả về thông tin người dùng đã đăng nhập dưới dạng JSON
        return response()->json($request->user());
    }
}
