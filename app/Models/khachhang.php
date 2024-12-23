<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class khachhang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'khachhang'; // Bảng tương ứng trong database

    protected $primaryKey = 'makh'; // Khóa chính, ví dụ là id

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    protected $fillable = [
        'hovaten',
        'loaikh',
        'email',
        'sodienthoai',
        'diachi',
        'ngaysinh',
        'diemtich',
    ];

    public function createApiToken()
    {
        return $this->createToken('YourAppName')->plainTextToken;
    }

    /**
     * Lấy thông tin tài khoản của nhân viên.
     * Chọn bảng phù hợp (account hoặc account_admin) dựa trên vai trò.
     */
    public function getAccount()
    {
        if ($this->isAdmin()) {
            return $this->admin_account;
        }
        return $this->account;
    }
}
