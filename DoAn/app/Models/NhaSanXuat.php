<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table = 'nha_san_xuats'; // Tên của bảng

    protected $primaryKey = 'ma_nsx'; // Khóa chính

    protected $fillable = [
        'ma_nsx',
        'ten_nsx',
    ];

    protected $casts = [
        'ma_nsx' => 'string',
    ];
}
