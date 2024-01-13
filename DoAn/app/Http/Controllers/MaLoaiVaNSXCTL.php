<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;

class MaLoaiVaNSXCTL extends Controller
{
    public function HienThiMaLoaiVaNSX()
    {
        $loaisp = LoaiSanPham::all();
        $nsx = NhaSanXuat::all();
        return view('admin.quan_ly.san_pham.them',['loaisp'=>$loaisp,'nsx'=>$nsx]);
    }
}
