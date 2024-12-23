<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham'; // Bảng tương ứng trong database

    protected $primaryKey = 'masp'; // Khóa chính

    public $timestamps = false; // Bỏ qua cột timestamps nếu không có

    // Các trường có thể gán giá trị hàng loạt (mass assignment)
    protected $fillable = [
        'tensanpham',
        'Commpany',
        'typename',
        'inches',
        'sreenresolution',
        'cpu',
        'ram',
        'memory',
        'gpu',
        'weight',
        'giaban',
        'mota',
        'makm',
    ];


    /**
     * Phương thức quan hệ với bảng KhuyenMai
     */
    public function KhuyenMai()
    {
        return $this->hasOne(KhuyenMai::class, 'makm', 'makm');
    }
}
