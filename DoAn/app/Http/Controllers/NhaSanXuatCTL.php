<?php

namespace App\Http\Controllers;

use App\Models\NhaSanXuat;
use Illuminate\Http\Request;

class NhaSanXuatCTL extends Controller
{
    public function HienThiNhaSanXuat()
    {
        $nsx = NhaSanXuat::all();
        return view('admin.quan_ly.nha_san_xuat.main',['nhasanxuat'=>$nsx]);
    }
    public function ThemNhaSanXuat(Request $thongtin)
    {
        $nsx = new NhaSanXuat();
        $nsx->ma_nsx = $thongtin->input('ma_nsx');
        $nsx->ten_nsx = $thongtin->input('ten_nsx');

        $nsx->save();
        // Đặt thông báo
        $thongBao = "Đã thêm loại sản phẩm mới thành công!";
        session()->flash('thongBao', $thongBao);
        return redirect()->route('HienThi.NhaSanXuat');
    }
    public function TrangSuaNhaSanXuat($ma_nsx)
    {
        $nsx = NhaSanXuat::find($ma_nsx);
        return view('admin.quan_ly.nha_san_xuat.sua',compact('nsx'));
    }
    public function SuaNhaSanXuat(Request $thongtin)
    {
        $nsx = NhaSanXuat::findOrFail($thongtin->input('ma_nsx'));

        $nsx->ten_nsx = $thongtin->input('ten_nsx');

        $nsx->save();

        return redirect()->route('HienThi.NhaSanXuat');
    }
    public function XoaNhaSanXuat($ma_nsx)
    {
        $nsx = NhaSanXuat::find($ma_nsx);
        $nsx->delete();

        return redirect()->route('HienThi.NhaSanXuat');
    }
    public function TimKiemNhaSanXuat(Request $tt)
{
    $ten_nsx = $tt->input('ten_nsx');
    $nsx = NhaSanXuat::where('ten_nsx', '=', $ten_nsx)->get();
    return view('timkiemnhasanxuat',compact('nsx'));
}
}
