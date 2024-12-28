<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTSP extends Model
{
    use HasFactory;

    protected $table = 'ctsp'; // Bảng tương ứng trong database

    protected $primaryKey = 'mactsp'; // Khóa chính

    // Các trường có thể gán giá trị hàng loạt (mass assignment)
    protected $fillable = [
        'dungluong',
        'mau',
        'masp',
        'phantramtang',
    ];


    /**
     * Phương thức quan hệ với bảng `SanPham` (Sản phẩm)
     */
    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'masp', 'masp');
    }
}
