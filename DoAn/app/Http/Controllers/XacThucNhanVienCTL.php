<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XacThucNhanVienCTL extends Controller
{
    public function DangNhap(Request $thongtin)
    {
        //dd($thongtin->only('email', 'password'));
        $arr = [
            'email_nv' => $thongtin->input('email'),
            'password' => $thongtin->input('password'),
        ];
        
        if (Auth::guard('nhan_vien')->attempt($arr)) {
            return redirect()->route('QTV.QuanLy');
        } else {
            $thongBao = "Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!";
            session()->flash('thongBao', $thongBao);

            return redirect()->route('NV.DangNhap');
        }
    }

    public function DangXuat()
    {
        Auth::guard('nhan_vien')->logout();
        return redirect()->route('NV.DangNhap');
    }
}
