<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'chi_tiet_hoa_dons';

    protected $fillable = [
        'ma_hd',
        'ma_sp',
        'gia_tien',
        'so_luong',
    ];

    public function HoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'ma_hd', 'ma_hd');
    }
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'ma_sp', 'ma_sp');
    }
}
