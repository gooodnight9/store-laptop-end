<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;

    protected $table = 'donhang'; // Bảng tương ứng trong database

    protected $primaryKey = 'madh'; // Khóa chính

    // Các trường có thể gán giá trị hàng loạt (mass assignment)
    protected $fillable = [
        'ngaydathang',
        'trangthaidonhang',
        'makm',
        'makh',
    ];


    /**
     * Phương thức quan hệ với bảng KhuyenMai
     */
    public function KhuyenMai()
    {
        return $this->hasOne(KhuyenMai::class, 'makm', 'makm');
    }

    public function khachhang()
    {
        return $this->hasMany(KhuyenMai::class, 'makm', 'makm');
    }
}
