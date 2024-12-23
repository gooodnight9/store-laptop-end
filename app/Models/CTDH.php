<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTDH extends Model
{
    use HasFactory;

    protected $table = 'ctdh'; // Bảng tương ứng trong database

    protected $primaryKey = null; // Khóa chính
    public $incrementing = false; // Khóa chính không tự động tăng

    // Các trường có thể gán giá trị hàng loạt (mass assignment)
    protected $fillable = [
        'madh',
        'masp',
        'soluong',
        'giaban',
        'mabh',
    ];

    /**
     * Thiết lập khóa chính composite (madh và masp)
     */
    public function getKeyName()
    {
        return ['madh', 'masp'];
    }

    /**
     * Phương thức quan hệ với bảng `SanPham` (Sản phẩm)
     */
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'masp', 'masp');
    }

    /**
     * Phương thức quan hệ với bảng `DonHang` (Đơn hàng)
     */
    public function donhang()
    {
        return $this->belongsTo(DonHang::class, 'madh', 'madh');
    }
}
