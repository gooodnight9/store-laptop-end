<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class nhanvien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nhanvien'; // Bảng tương ứng trong database

    protected $primaryKey = 'manv'; // Khóa chính

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    protected $fillable = [
        'hovaten',
        'ngaysinh',
        'diachi',
        'sodienthoai',
        'email',
        'role_id',
        'macn',
    ];


    /**
     * Phương thức quan hệ với bảng account nếu nhân viên không phải admin.
     */
    public function account()
    {
        return $this->hasOne(account::class, 'manv', 'manv');
    }

    /**
     * Phương thức quan hệ với bảng account_admin nếu nhân viên là admin.
     */
    public function admin_account()
    {
        return $this->hasOne(admin_account::class, 'manv', 'manv');
    }

    /**
     * Kiểm tra vai trò của nhân viên, ví dụ nếu là admin.
     */
    public function isAdmin()
    {
        return $this->role_id == 1; // Giả sử role_id = 1 là admin
    }

    /**
     * Tạo token API cho nhân viên.
     */
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
