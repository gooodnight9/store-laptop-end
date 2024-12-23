<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;

    protected $table = 'khuyenmai'; // Bảng tương ứng trong database

    protected $primaryKey = 'makm'; // Khóa chính

    // Các trường có thể gán giá trị hàng loạt (mass assignment)
    protected $fillable = [
        'loaikm',
        'sotienkm',
        'ngaybatdau',
        'ngaykethuc',
        'dieukien',
    ];

    // Chuyển đổi kiểu dữ liệu cho các trường
    protected $casts = [
        'sotienkm' => 'float',
    ];

    // Các trường kiểu ngày tháng
    protected $dates = [
        'ngaybatdau',
        'ngaykethuc',
    ];

    // Các giá trị mặc định
    protected $attributes = [
        'dieukien' => 'Không có điều kiện',
    ];

    // Accessor - Định dạng lại ngày tháng khi truy xuất
    public function getNgaybatdauAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
