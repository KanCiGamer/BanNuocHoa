<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    protected $primaryKey = 'ma_hd';

    protected $fillable = [
        'ma_hd',
        'ngay_tao_hd',
        'trang_thai_hd',
        'dia_chi_hd',
        'so_dien_thoai_hd',
        'ngay_giao_hd',
        'ma_kh',
        'ten_kh',
        'email_kh',
    ];

    public function KhachHang()
    {
        return $this->hasOne(KhachHang::class, 'ma_kh', 'ma_kh');
    }
    public function ChiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'ma_hd', 'ma_hd');
    }

    protected $casts =[
        'ma_hd' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];
}
