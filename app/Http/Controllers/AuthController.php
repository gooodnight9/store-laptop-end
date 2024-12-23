<?php

namespace App\Http\Controllers;

use App\Models\admin_account;
use App\Models\nhanvien;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\Controller;
use App\Mail\SendOtpEmail;
use App\Models\khachhang;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


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


    // register khachang 
    public function registerKH(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'hovaten' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email', // Email phải duy nhất trong bảng nhân viên
            'ngaysinh' => 'required|date|before:today',
            'password' => 'required|string|min:6|confirmed',
            'diachi' => 'nullable|string|max:255',
            'sodienthoai' => 'nullable|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Tạo nhân viên mới
        $khachhang = khachhang::create([
            'hovaten' => $request->hovaten,
            'loaikh' => 'Đồng',
            'email' => $request->email,
            'sodienthoai' => $request->sodienthoai,
            'diachi' => $request->diachi,
            'ngaysinh' => $request->ngaysinh,
            'diemtich' => 0,
        ]);

        //  lưu thông tin tài khoản vào bảng phù hợp
        account::create([
            'makh' => $khachhang->makh,
            'password' => Hash::make($request->password),
        ]);

        // Tạo token khi đăng ký thành công
        $token = $khachhang->createToken('YourAppName')->plainTextToken;

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

        // Kiểm tra email trong bảng `nhanvien`
        $nhanvien = nhanvien::where('email', $request->email)->first();
        if ($nhanvien) {
            $account = account::where('manv', $nhanvien->manv)->first();

            if (!$account || !Hash::check($request->password, $account->password)) {
                return response()->json(['message' => 'Thông tin đăng nhập nhân viên không hợp lệ'], 401);
            }

            // Tạo OTP cho nhân viên
            $otp = rand(100000, 999999);

            // Gửi email với OTP
            Mail::to($request->email)->send(new SendOtpEmail($otp));

            // Lưu OTP vào cache
            Cache::put('otp_' . $request->email, $otp, now()->addMinutes(5));

            Log::info('OTP đã được lưu vào cache: ' . Cache::get('otp_' . $request->email));
            return response()->json(['message' => 'Mã OTP đã được gửi đến email của bạn (nhân viên)'], 200);
        }

        // Kiểm tra email trong bảng `khachhang`
        $khachhang = khachhang::where('email', $request->email)->first();
        if ($khachhang) {
            $account = account::where('makh', $khachhang->makh)->first();

            if (!$account || !Hash::check($request->password, $account->password)) {
                return response()->json(['message' => 'Thông tin đăng nhập khách hàng không hợp lệ'], 401);
            }

            // Tạo OTP cho khách hàng
            $otp = rand(100000, 999999);

            // Gửi email với OTP
            Mail::to($request->email)->send(new SendOtpEmail($otp));

            // Lưu OTP vào cache
            Cache::put('otp_' . $request->email, $otp, now()->addMinutes(5));

            Log::info('OTP đã được lưu vào cache: ' . Cache::get('otp_' . $request->email));
            return response()->json(['message' => 'Mã OTP đã được gửi đến email của bạn (khách hàng)'], 200);
        }

        // Nếu email không tồn tại trong cả hai bảng
        return response()->json(['message' => 'Email không tồn tại'], 404);
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

        // Tạo OTP 
        $otp = rand(100000, 999999);

        // Gửi email với OTP 
        Mail::to($request->email)->send(new SendOtpEmail($otp));

        // Lưu OTP và thời gian hết hạn vào Cache
        $expirationTime = now()->addMinutes(5); // Mã OTP có hiệu lực trong 5 phút
        Cache::put('otp_' . $request->email, $otp, $expirationTime);
        Log::info('OTP đã được lưu vào cache: ' . Cache::get('otp_' . $request->email));
        return response()->json(['message' => 'Mã OTP đã được gửi đến email của bạn'], 200);
        // // Tạo token cho admin
        // $token = $nhanvien->createToken('AdminApp')->plainTextToken;

        // return response()->json([
        //     'token' => $token,
        //     'message' => 'Đăng nhập admin thành công',
        //     'user' => $nhanvien, // Trả thêm thông tin nhân viên (nếu cần)
        // ], 200);
    }

    // Xác thực OTP
    public function verifyOtp(Request $request)
    {
        // Validate OTP
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Kiểm tra OTP từ Cache
        $otpInCache = Cache::get('otp_' . $request->email);
        $otpFromRequest = $request->otp; // Lấy OTP từ request

        // Ghi vào log OTP từ cache và OTP người dùng nhập vào
        Log::info('OTP trong cache: ' . $otpInCache);
        Log::info('OTP từ request: ' . $otpFromRequest);

        // Kiểm tra OTP
        if ($otpFromRequest != $otpInCache) {
            return response()->json(['message' => 'Mã OTP không chính xác'], 401);
        }

        // Kiểm tra nếu OTP đã hết hạn
        if (!$otpInCache) {
            return response()->json(['message' => 'Mã OTP không hợp lệ hoặc đã hết hạn'], 401);
        }

        // OTP hợp lệ, tạo token và đăng nhập thành công
        $nhanvien = nhanvien::where('email', $request->email)->first();

        // Tạo token
        $token = $nhanvien->createToken('YourAppName')->plainTextToken;

        // Xóa OTP khỏi Cache sau khi xác thực thành công
        Cache::forget('otp_' . $request->email);

        return response()->json([
            'token' => $token,
            'message' => 'Đăng nhập thành công!',
        ], 200);
    }

    public function verifyOtpForKhachHang(Request $request)
    {
        // Validate OTP
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric|digits:6', // Kiểm tra OTP phải là 6 chữ số
        ]);

        // Nếu validate thất bại, trả về lỗi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Kiểm tra OTP từ Cache
        $otpInCache = Cache::get('otp_' . $request->email);
        $otpFromRequest = $request->otp; // Lấy OTP từ request

        // Ghi vào log OTP từ cache và OTP người dùng nhập vào
        Log::info('OTP trong cache: ' . $otpInCache);
        Log::info('OTP từ request: ' . $otpFromRequest);

        // Kiểm tra OTP
        if ($otpFromRequest != $otpInCache) {
            return response()->json(['message' => 'Mã OTP không chính xác'], 401);
        }

        // Kiểm tra nếu OTP đã hết hạn
        if (!$otpInCache) {
            return response()->json(['message' => 'Mã OTP không hợp lệ hoặc đã hết hạn'], 401);
        }

        // OTP hợp lệ, tìm khách hàng tương ứng với email
        $khachhang = khachhang::where('email', $request->email)->first();

        if (!$khachhang) {
            return response()->json(['message' => 'Khách hàng không tồn tại'], 404);
        }

        // Tạo token cho khách hàng
        $token = $khachhang->createToken('YourAppName')->plainTextToken;

        // Xóa OTP khỏi Cache sau khi xác thực thành công
        Cache::forget('otp_' . $request->email);

        // Trả về token và thông báo thành công
        return response()->json([
            'token' => $token,
            'message' => 'Đăng nhập thành công!',
        ], 200);
    }

    // Quên mật khẩu
    public function forgotPassword(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:khachhang,email',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Tạo OTP ngẫu nhiên
        $otp = rand(100000, 999999);

        // Gửi OTP qua email
        Mail::to($request->email)->send(new SendOtpEmail($otp));

        // Lưu OTP vào cache với thời gian hiệu lực là 5 phút
        Cache::put('reset_password_otp_' . $request->email, $otp, now()->addMinutes(5));

        return response()->json([
            'message' => 'Mã OTP đã được gửi đến email của bạn. Hãy kiểm tra hộp thư để tiếp tục.',
        ], 200);
    }

    // resetPassword 
    public function resetPassword(Request $request)
    {
        // Validate yêu cầu
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:khachhang,email',
            'otp' => 'required|numeric|digits:6',
            'new_password' => 'required|string|min:6|confirmed', // Mật khẩu cần nhập lại để xác nhận
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Lấy OTP từ cache
        $cachedOtp = Cache::get('reset_password_otp_' . $request->email);

        // Kiểm tra OTP
        if (!$cachedOtp || $cachedOtp != $request->otp) {
            return response()->json(['message' => 'Mã OTP không chính xác hoặc đã hết hạn'], 401);
        }

        // OTP hợp lệ -> Cập nhật mật khẩu mới
        $account = account::where('email', $request->email)->first();
        $account->password = Hash::make($request->new_password);
        $account->save();

        // Xóa OTP khỏi cache
        Cache::forget('reset_password_otp_' . $request->email);

        return response()->json([
            'message' => 'Mật khẩu của bạn đã được đặt lại thành công.',
        ], 200);
    }


    // Lấy thông tin nhân viên đã đăng nhập
    public function nhanvien(Request $request)
    {
        // Trả về thông tin người dùng đã đăng nhập dưới dạng JSON
        return response()->json($request->user());
    }

    // Thêm phương thức logout
    public function logout(Request $request)
    {
        // Đảm bảo người dùng đã đăng nhập
        $user = $request->user();

        // Xóa tất cả các token của người dùng hoặc chỉ token hiện tại
        $user->tokens->each(function ($token) {
            $token->delete(); // Xóa token
        });

        return response()->json(['message' => 'Đăng xuất thành công'], 200);
    }
}
