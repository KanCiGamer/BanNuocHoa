<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NhanVien extends Authenticatable
{
    protected $table = 'nhan_viens';
    protected $primaryKey = 'ma_nv';

    protected $fillable = [
        'ma_nv',
        'ten_nv',
        'email_nv',
        'password',
    ];

    protected $casts =[
        'ma_nv' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
         'password',
        // 'remember_token',
    ];
}
