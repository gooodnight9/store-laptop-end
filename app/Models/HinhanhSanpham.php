<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhanhSanpham extends Model
{
    // Tắt tính năng timestamps
    public $timestamps = false;
    use HasFactory;

    protected $table = 'hinhanh_sanpham';

    protected $fillable = [
        'url_hinh',
        'masp',
    ];
}
