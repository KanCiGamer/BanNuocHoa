<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use Illuminate\Http\Request;

class LoaiSanPhamCTL extends Controller
{
    public function HienThiLoaiSanPham()
    {
        $loaisp = LoaiSanPham::all();
        return view('admin.quan_ly.loai_san_pham.main',['loaisp'=>$loaisp]);
    }
    public function ThemLoaiSanPham(Request $thongtin)
    {
        $loaisp = new LoaiSanPham();
        $loaisp->ma_loai = $thongtin->input('ma_loai');
        $loaisp->ten_loai = $thongtin->input('ten_loai');

        $loaisp->save();
        // Đặt thông báo
        $thongBao = "Đã thêm loại sản phẩm mới thành công!";
        session()->flash('thongBao', $thongBao);
        return redirect()->route('HienThi.LoaiSanPham');
    }
    public function TrangSuaLoaiSanPham($ma_loai)
    {
        $loaisp = LoaiSanPham::find($ma_loai);
        return view('admin.quan_ly.loai_san_pham.sua',compact('loaisp'));
    }
    public function SuaLoaiSanPham(Request $thongtin)
    {
        $loaisp = LoaiSanPham::findOrFail($thongtin->input('ma_loai'));

        $loaisp->ten_loai = $thongtin->input('ten_loai');

        $loaisp->save();

        return redirect()->route('HienThi.LoaiSanPham');
    }
    public function XoaLoaiSanPham($ma_loai)
    {
        $loaisp = LoaiSanPham::find($ma_loai);
        $loaisp->delete();

        return redirect()->route('HienThi.LoaiSanPham');
    }
}
