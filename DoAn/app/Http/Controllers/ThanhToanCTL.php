<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use Illuminate\Support\Facades\Auth;

class ThanhToanCTL extends Controller
{
    public function ThanhToan(Request $thongtin)
    {
        $giohang = session()->get('giohang',[]);

        $hoadon = new HoaDon();
        $ma_hoa_don = date('dmY').rand(1,99);
        $hoadon->ma_hd = $ma_hoa_don;
        $hoadon->ngay_tao_hd = date('Y-m-d');
        $hoadon->ngay_giao_hd = date('Y-m-d');
        $hoadon->trang_thai_hd = false;
        $hoadon->dia_chi_hd = $thongtin->input('dia_chi');
        $hoadon->so_dien_thoai_hd = $thongtin->input('sdt');
        $hoadon->email_kh = $thongtin->input('email_kh');
        $hoadon->ten_kh = $thongtin->input('ten_kh');
        $hoadon->ma_kh = Auth::guard('khach_hang')->check() ?  Auth::guard('khach_hang')->user()->ma_kh : null;

        $hoadon->save();

        foreach($giohang as $ma_sp => $sanpham)
        {
            $chitiethoadon = new ChiTietHoaDon();
            $chitiethoadon->ma_hd = $ma_hoa_don;
            $chitiethoadon->ma_sp = $ma_sp;
            $chitiethoadon->gia_tien = $sanpham['gia_sp'];
            $chitiethoadon->so_luong = $sanpham['so_luong'];
            $chitiethoadon->save();
        }

        session()->forget('giohang');

        return view('others.ma_dh', ['ma_hd'=>$ma_hoa_don]);
    }
}