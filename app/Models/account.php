<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $table = 'account'; // Bảng tương ứng trong database

    protected $primaryKey = 'password_id'; // Khóa chính (nếu có)

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    protected $fillable = [
        'password',
        'manv',  // Khóa ngoại liên kết với bảng nhân viên
        'makh',  // Khóa ngoại liên kết với bảng khách hàng (nếu cần)
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


    public function khachhang()
    {
        return $this->belongsTo(khachhang::class, 'makh', 'makh');
    }
}
