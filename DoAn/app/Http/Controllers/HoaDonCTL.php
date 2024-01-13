<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HoaDon;


class HoaDonCTL extends Controller
{
    public function TimKiem($ma_hd)
    {
        $hoadon = HoaDon::where('ma_hd', $ma_hd)->first();

        if($hoadon)
        {
            $hoadon->load(['ChiTietHoaDon'=>function ($truy_van)
        {
            $truy_van->with('SanPham');
        }]);
            return response()->json($hoadon);
        }
        return response()->json(['error'=> 'Not Found'],404);
    }
    public function ChiTiet($ma_hd)
    {
        $hoadon = HoaDon::where('ma_hd', $ma_hd)->first();

        if ($hoadon) {
            $hoadon->load(['ChiTietHoaDon'=>function ($truy_van) {
                $truy_van->with('SanPham');
            }]);
            return view('user.chitiethoadon', ['hoadon' => $hoadon]);
        }
    }
    public function DuyetHoaDon($ma_hd)
    {
        $hoadon = HoaDon::find($ma_hd);
    
        if ($hoadon) {
            $hoadon->trang_thai_hd = true; 
            $hoadon->ngay_giao_hd = now(); 
            $hoadon->save(); 
        }
        return redirect()->route('HienThi.HoaDon');
    }
    
    public function ChiTietHoaDon($ma_hd)
    {
        $hoadon = HoaDon::where('ma_hd', $ma_hd)->first();

        if ($hoadon) {
            $hoadon->load(['ChiTietHoaDon'=>function ($truy_van) {
                $truy_van->with('SanPham');
            }]);
            return view('admin.quan_ly.hoa_don.chitiet', ['hoadon' => $hoadon]);
        }
    }
    public function DanhSachHoaDon()
    {
        $hoadon = HoaDon::all();
        return view('admin.quan_ly.hoa_don.hienthi',['hoadon'=>$hoadon]);
    }
}
