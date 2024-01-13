<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';

    protected $primaryKey = 'ma_sp';

    protected $fillable = [
        'ma_sp',
        'ten_sp',
        'mota_sp',
        'hinhanh_sp',
        'gia_sp',
        'tonkho_sp',
        'ma_nsx',
        'ma_loai',
    ];

    public function NhaSanXuat()
    {
        return $this->hasOne(NhaSanXuat::class, 'ma_nsx', 'ma_nsx');
    }

    public function LoaiSanPham()
    {
        return $this->hasOne(LoaiSanPham::class, 'ma_loai', 'ma_loai');
    }

    protected $casts =[
        'ma_sp' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];
}
