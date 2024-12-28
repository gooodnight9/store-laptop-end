<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;  // Đảm bảo đã import Carbon


class VnpayController extends Controller
{

    public function createPayment(Request $request)
    {
        try {
            // Lấy các tham số từ form hoặc từ database
            $orderId = 'order_' . time();
            $amount = $request->input('amount');
            $orderInfo = 'Thanh toán đơn hàng: ' . $orderId;
            $locale = 'vn'; // Có thể là 'vn' hoặc 'en'
            $ipAddr = $request->ip();

            // Lấy thời gian hiện tại tại Việt Nam bằng Carbon và chuyển thành định dạng YmdHis
            $createDate = Carbon::now('Asia/Ho_Chi_Minh')->format('YmdHis');

            // Lấy thời gian hết hạn (5 phút sau) tại Việt Nam
            $expireDate = Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(5)->format('YmdHis');  // Cộng thêm 5 phút

            // Lấy thông tin từ file .env
            $vnp_HashSecret = "KJD9KWKWPIG8DRWJL7RQ6T5GGG7KGIU9";
            $vnp_TmnCode = "BQ9TYVHA";

            Log::info('VNPAY Hash Secret: ' . $vnp_HashSecret);
            Log::info('VNPAY TmnCode: ' . $vnp_TmnCode);

            // Tạo mảng dữ liệu thanh toán
            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $amount * 100,  // Số tiền cần nhân với 100
                "vnp_Command" => "pay",
                "vnp_CreateDate" => $createDate,
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $ipAddr,
                "vnp_Locale" => $locale,
                "vnp_OrderInfo" => $orderInfo,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => "https://yourwebsite.com/return",
                "vnp_TxnRef" => $orderId,
                "vnp_ExpireDate" => $expireDate
            ];

            Log::info('Input Data: ' . json_encode($inputData));

            // Tạo mã checksum (Secure Hash)
            $secureHash = $this->generateSecureHash($inputData, $vnp_HashSecret);
            Log::info('Secure Hash: ' . $secureHash);

            $inputData['vnp_SecureHash'] = $secureHash;

            // Tạo URL thanh toán
            $vnpUrl = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html" . '?' . http_build_query($inputData);

            Log::info('Payment URL: ' . $vnpUrl);

            // Chuyển hướng người dùng đến URL thanh toán
            return $vnpUrl;
        } catch (\Exception $e) {
            Log::error('Error in createPayment: ' . $e->getMessage());
            return response()->json(['error' => 'Lỗi khi tạo đơn hàng'], 500);
        }
    }



    private function generateSecureHash($inputData, $vnp_HashSecret)
    {
        // Sắp xếp dữ liệu theo thứ tự a-z
        ksort($inputData);

        // Nối các tham số lại với nhau thành một chuỗi
        $hashString = '';
        foreach ($inputData as $key => $value) {
            if ($key != 'vnp_SecureHash' && $value != '') {
                $hashString .= $key . '=' . $value . '&';
            }
        }

        // Loại bỏ dấu & cuối cùng
        $hashString = rtrim($hashString, '&');

        // Thêm Secret Key vào cuối chuỗi
        $hashString .= '&' . 'vnp_HashSecret=' . $vnp_HashSecret;

        // Tính toán mã HMAC-SHA512
        return strtoupper(hash_hmac('sha512', $hashString, $vnp_HashSecret));
    }




    // Xử lý kết quả trả về từ VNPAY
    public function return(Request $request)
    {
        // Xử lý các tham số trả về từ VNPAY
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $data = $request->all();

        // Kiểm tra mã bảo mật
        if ($this->checkSecureHash($data, $vnp_SecureHash)) {
            // Xử lý kết quả thanh toán (thành công hoặc thất bại)
            $orderId = $data['vnp_TxnRef'];
            $status = $data['vnp_ResponseCode'];

            // Cập nhật trạng thái đơn hàng trong DB hoặc thông báo kết quả cho khách hàng
            if ($status == '00') {
                // Thành công
                // Cập nhật trạng thái đơn hàng
            } else {
                // Thất bại
            }
        }
        // Trả về kết quả
        return view('vnpay_return', compact('data'));
    }

    // Hàm kiểm tra mã bảo mật
    private function checkSecureHash($data, $vnp_SecureHash)
    {
        // Tạo lại mã checksum và so sánh với mã trả về từ VNPAY
        $vnp_HashSecret = "KJD9KWKWPIG8DRWJL7RQ6T5GGG7KGIU9";
        unset($data['vnp_SecureHash']);
        $secureHash = $this->generateSecureHash($data, $vnp_HashSecret);

        return $secureHash === $vnp_SecureHash;
    }
}
