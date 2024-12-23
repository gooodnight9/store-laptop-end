<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;

    protected $table = 'giohang'; // Bảng tương ứng trong database

    protected $primaryKey = 'magh'; // Khóa chính, ví dụ là id

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    protected $fillable = [
        'soluong', // Tên người dùng admin
        'masp', // Mật khẩu của admin
        'makh' // Khóa ngoại liên kết với bảng nhân viên
    ];


    /**
     * Quan hệ với bảng SanPham (masp).
     */
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'masp', 'masp');
    }


    /**
     * Quan hệ với bảng SanKhachHang (makh).
     */
    public function KhachHang()
    {
        return $this->belongsTo(khachhang::class, 'makh', 'makh');
    }
}
