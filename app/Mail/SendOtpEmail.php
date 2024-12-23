<?php

// app/Mail/SendOtpEmail.php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class SendOtpEmail extends Mailable
{
    public $otp;

    // Constructor nhận OTP làm tham số
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    public function build()
    {
        return $this->subject('Mã OTP Xác Nhận Đăng Nhập')
            ->view('emails.otp') // Chỉ định template view
            ->with(['otp' => $this->otp]); // Truyền OTP vào view
    }
}
