<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\HoaDon;

class KhachHangCTL extends Controller
{
    public function HienThiKH()
    {
        $kh = Khachhang::all();

        return view('admin.quan_ly.khach_hang.main',['khachhang'=>$kh]);
    }
    public function TrangSuaKhachHang($ma_kh)
    {
        $kh = KhachHang::find($ma_kh);
        return view('admin.quan_ly.khach_hang.sua',compact('kh'));
    }
    public function SuaKhachHang(Request $thongtin)
    {
        $Kh= KhachHang::findOrFail($thongtin->input('ma_kh'));

        $Kh->ten_kh = $thongtin->input('ten_kh');
        $Kh->email_kh = $thongtin->input('email_kh');
        $Kh->password = bcrypt($thongtin->input('password'));

        $Kh->save();
        return redirect()->route('QuanLy.KH');
    }
    public function XoaKhachHang($ma_kh)
    {
        $Kh = KhachHang::find($ma_kh);
        $Kh->delete();

        return redirect()->route('QuanLy.KH');
    }


    public function ThongTinKhachHang($ma_kh)
    {
        $kh = KhachHang::find($ma_kh);
        $hd = $kh->HoaDon;
        return view('user.thongtin',['khachhang'=>$kh, 'hoadon'=>$hd]);
    }
    public function CapNhatKhachHang(Request $tt, $ma_kh)
    {
        $Kh= KhachHang::findOrFail($ma_kh);

        $Kh->ten_kh = $tt->input('ten_kh');
        $Kh->diachi_kh = $tt->input('diachi_kh');
        $Kh->save();
        return redirect()->route('ThongTin.KhachHang',$ma_kh);
    }
}
