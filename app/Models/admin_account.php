<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_account extends Model
{
    use HasFactory;

    protected $table = 'admin_account'; // Bảng tương ứng trong database

    protected $primaryKey = 'id'; // Khóa chính, ví dụ là id

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    protected $fillable = [
        'usernameadmin', // Tên người dùng admin
        'passwordadmin', // Mật khẩu của admin
        'manv',           // Khóa ngoại liên kết với bảng nhân viên
        'macn',           // Khóa ngoại liên kết với bảng chi nhánh
    ];


    protected $hidden = [
        'passwordadmin',
        'remember_token',
    ];

    /**
     * Quan hệ với bảng nhân viên (NhanVien).
     */
    public function nhanVien()
    {
        return $this->belongsTo(nhanvien::class, 'manv', 'manv');
    }
}
