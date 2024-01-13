<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;

class NhanVienCTL extends Controller
{
    public function HienThiNV()
    {
        $nv = NhanVien::all();
        return view('admin.quan_ly.nhan_vien.hienthi',['nhanvien'=>$nv]);
    }
    public function ThemNhanVien(Request $thongtin)
    {
        $nv = new NhanVien();
        $nv->ma_nv = $thongtin->input('ma_nv');
        $nv->ten_nv = $thongtin->input('ten_nv');
        $nv->email_nv = $thongtin->input('email_nv');
        $nv->password = bcrypt($thongtin->input('password'));

        $nv->save();
        return redirect()->route('QuanLy.NV');
    }
    public function TrangSuaNhanVien($ma_nv)
    {
        $nv = NhanVien::find($ma_nv);
        return view('admin.quan_ly.nhan_vien.sua',compact('nv'));
    }
    public function SuaNhanVien(Request $thongtin)
    {
        $nv= NhanVien::findOrFail($thongtin->input('ma_nv'));

        $nv->ten_nv = $thongtin->input('ten_nv');
        $nv->email_nv = $thongtin->input('email_nv');
        $nv->password = bcrypt($thongtin->input('password'));

        $nv->save();
        return redirect()->route('QuanLy.NV');
    }
    public function XoaNhanVien($ma_nv)
    {
        $nv = NhanVien::find($ma_nv);
        $nv->delete();

        return redirect()->route('QuanLy.NV');
    }
}
