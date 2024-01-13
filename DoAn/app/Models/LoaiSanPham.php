<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    protected $table = 'loai_san_phams';
    protected $primaryKey = 'ma_loai';

    protected $fillable = [
        'ma_loai',
        'ten_loai',
    ];

    protected $casts =[
        'ma_loai' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];
}
