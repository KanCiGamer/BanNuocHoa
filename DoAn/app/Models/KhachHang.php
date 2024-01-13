<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class KhachHang extends Authenticatable
{
    protected $table = 'khach_hangs';
    
    protected $primaryKey = 'ma_kh';

    protected $fillable = [
        'ma_kh',
        'ten_kh',
        'email_kh',
        'sodienthoai_kh',
        'diachi_kh',
        'password',
    ];
    public function HoaDon()
    {
        return $this->hasMany(HoaDon::class, 'ma_kh', 'ma_kh');
    }

    protected $casts =[
        'ma_kh' => 'string',
    ];
    
    // không hiển thị khi trả về kết quả
    protected $hidden = [
        'password',
        // 'remember_token',
    ];
}
