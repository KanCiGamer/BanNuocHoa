<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoa_Don_Tam extends Model
{
    protected $table = 'hoa_don_tams'; // Tên của bảng

    protected $primaryKey = 'ma_hd_tam'; // Khóa chính

    protected $fillable = [
        'ma_hd_tam',
        'ngay_tao_hd_tam',
        'trang_thai_hd_tam',
        'dia_chi_hd_tam',
        'so_dien_thoai_hd_tam',
        'ngay_giao_hd_tam',
        'ma_kh',
    ];
}
