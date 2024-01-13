<?php

namespace App\Http\Controllers;

use App\Models\QuanTriVien;
use Illuminate\Http\Request;

class QuanTriVienCTL extends Controller
{
    public function HienThiQTV()
    {
        $qtv = QuanTriVien::all();
        return view('admin.quan_ly.quan_tri_vien.main',['quantrivien'=>$qtv]);
    }
    public function ThemQuanTriVien(Request $thongtin)
    {
        $qtv = new QuanTriVien();
        $qtv->ma_qtv = $thongtin->input('ma_qtv');
        $qtv->ten_qtv = $thongtin->input('ten_qtv');
        $qtv->email_qtv = $thongtin->input('email_qtv');
        $qtv->password = bcrypt($thongtin->input('password'));

        $qtv->save();
        return redirect()->route('QuanLy.QTV');
    }
    public function XoaQuanTriVien($ma_qtv)
    {
        $qtv = QuanTriVien::find($ma_qtv);
        $qtv->delete();

        return redirect()->route('QuanLy.QTV');
    }
}
