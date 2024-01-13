<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class TrangChuCTL extends Controller
{
    public function HienThiSanPham()
    {
        $sp = SanPham::all();
        return view('home',['sanpham'=>$sp]);
    }
}
