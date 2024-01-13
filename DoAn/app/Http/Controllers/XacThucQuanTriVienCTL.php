<?php

namespace App\Http\Controllers;

use App\Models\QuanTriVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XacThucQuanTriVienCTL extends Controller
{
    public function DangNhap(Request $thongtin)
    {
        //dd($thongtin->only('email', 'password'));
        $arr = [
            'email_qtv' => $thongtin->input('email'),
            'password' => $thongtin->input('password'),
        ];
        
        if (Auth::guard('quan_tri_vien')->attempt($arr)) {
            return redirect()->route('QTV.QuanLy');
        } else {
            $thongBao = "Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!";
            session()->flash('thongBao', $thongBao);

            return redirect()->route('QTV.DangNhap');
        }
    }

    public function DangXuat()
    {
        Auth::guard('quan_tri_vien')->logout();
        return redirect()->route('QTV.DangNhap');
    }
}
