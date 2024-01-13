<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class QuanTriVien extends Authenticatable
{
    use Notifiable;
    protected $table = 'quan_tri_viens';

    protected $primaryKey = 'ma_qtv';

    protected $fillable = [
        'ma_qtv',
        'ten_qtv',
        'email_qtv',
        'password',
    ];

    protected $casts =[
        'ma_qtv' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
        'password',
        // 'remember_token',
    ];
}
