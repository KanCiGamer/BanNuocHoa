<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\NhaSanXuat;
use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamCTL extends Controller
{
    public function HienThiSanPham()
    {
        $sp = SanPham::all();
        return view('admin.quan_ly.san_pham.hienthi',['sanpham'=>$sp]);
    }
    public function ThemSanPham(Request $thongtin)
    {
        $sp = new SanPham();
        $sp->ma_sp = $thongtin->input('ma_sp');
        $sp->ten_sp = $thongtin->input('ten_sp');
        if(SanPham::where('ten_sp', '=', $sp->ten_sp)->get())
        {
            $thongBao = "Tên sản phẩm đã tồn tại!";
            session()->flash('thongBao', $thongBao);
            return redirect()->route('TrangThem.SanPham');
        }
        
        $sp->mota_sp = $thongtin->input('mota_sp');
        $sp->hinhanh_sp = $thongtin->input('hinhanh_sp');
        $sp->gia_sp = $thongtin->input('gia_sp');
        $sp->tonkho_sp = $thongtin->input('tonkho_sp');
        $sp->ma_nsx = $thongtin->input('ma_nsx');
        $sp->ma_loai = $thongtin->input('ma_loai');

        $file = $thongtin->file('hinhanh_sp');
        $file_name = $file->getClientOriginalName();
        $file->move('images', $file_name);
        $sp->hinhanh_sp = $file_name;

        $sp->save();
        // Đặt thông báo
        $thongBao = "Thêm sản phẩm mới thành công!";
        session()->flash('thongBao', $thongBao);
        return redirect()->route('HienThi.SanPham');
    }

    public function TrangSuaSanPham($ma_sp)
    {
        $sp = SanPham::find($ma_sp);
        $nsx = NhaSanXuat::all();
        $loaisp = LoaiSanPham::all();
        return view('admin.quan_ly.san_pham.sua',compact('sp', 'nsx', 'loaisp'));
    }
    public function ChiTietSanPham($ma_sp)
    {
        $sp = SanPham::find($ma_sp);
        $nsx = NhaSanXuat::find($sp->ma_nsx);
        $loaisp = LoaiSanPham::find($sp->ma_loai);
        $spk = SanPham::all();
        return view('chitiet',compact('sp', 'nsx', 'loaisp', 'spk'));
    }
    public function SuaSanPham(Request $thongtin)
    {
        $sp = SanPham::findOrFail($thongtin->input('ma_sp'));

        $sp->ten_sp = $thongtin->input('ten_sp');
        $sp->mota_sp = $thongtin->input('mota_sp');
        $sp->hinhanh_sp = $thongtin->input('hinhanh_sp');
        $sp->gia_sp = $thongtin->input('gia_sp');
        $sp->tonkho_sp = $thongtin->input('tonkho_sp');
        $sp->ma_nsx = $thongtin->input('ma_nsx');
        $sp->ma_loai = $thongtin->input('ma_loai');

        $file = $thongtin->file('hinhanh_sp');
        $file_name = $file->getClientOriginalName();
        $file->move('images', $file_name);
        $sp->hinhanh_sp = $file_name;
        $sp->save();

        return redirect()->route('HienThi.SanPham');
    }
    public function XoaSanPham($ma_sp)
    {
        $sp = SanPham::find($ma_sp);
        $sp->delete();

        return redirect()->route('HienThi.SanPham');
    }

    public function TimKiem(Request $tt)
    {
        $ten_sp = $tt->input('ten_sp');
        $sp = SanPham::where('ten_sp', 'like', '%'.$ten_sp.'%')->get();
        //dd($sp);
        $spk = SanPham::all();
        return view('timkiem',compact('sp', 'spk'));
    }
}
