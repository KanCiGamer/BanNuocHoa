<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class XacThucKhachHangCTL extends Controller
{
    public function DangKy(Request $thongtin)
    {
        $this->validate($thongtin,
            [
                // quy tắc kiểm tra.
                'ten_kh' =>'required',
                'email_kh' =>'required|email|unique:khach_hangs',
                'sodienthoai_kh' =>'required|unique:khach_hangs',
                'diachi_kh' =>'required',
                'password' => ['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/','min:6'],
            ],
            [
                // thông báo lỗi
                'ten_kh.required' => 'Bạn chưa nhập tên khách hàng',
                'email_kh.required' => 'Bạn chưa nhập email',
                'email_kh.email' => 'Email không đúng định dạng',
                'email_kh.unique' => 'Email đã được sử dụng',
                'sodienthoai_kh.required' => 'Bạn chưa nhập số điện thoại',
                'sodienthoai_kh.unique' => 'Số điện thoại này đã được sử dụng',
                'diachi_kh.required' => 'Bạn chưa nhập địa chỉ',
                'password.required' => 'Mật khẩu yêu cầu chữ Hoa, thường và ký tự đặc biệt',
                'password.regex' => 'Mật khẩu yêu cầu chữ Hoa, thường và ký tự đặc biệt',
            ]
        );
    
        $kh = new KhachHang();
        $kh->ma_kh = $thongtin->sodienthoai_kh;
        $kh->ten_kh = $thongtin->ten_kh;
        $kh->email_kh = $thongtin->email_kh;
        $kh->sodienthoai_kh = $thongtin->sodienthoai_kh;
        $kh->diachi_kh = $thongtin->diachi_kh;
        $kh->password = bcrypt($thongtin->password);
        $kh->save();

        HoaDon::where('so_dien_thoai_hd', $thongtin->sodienthoai_kh)
        ->wherenull('ma_kh')->update(['ma_kh'=> $thongtin->sodienthoai_kh]);
    
        return redirect()->route('KH.DangNhap');
    }
    public function DangNhap(Request $thongtin)
    {
        //dd($thongtin->only('email', 'password'));
        $arr = [
            'email_kh' => $thongtin->input('email'),
            'password' => $thongtin->input('password'),
        ];
        
        if (Auth::guard('khach_hang')->attempt($arr)) {
            return redirect()->route('home');
        } else {
            $thongBao = "Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!";
            session()->flash('thongBao', $thongBao);

            return redirect()->route('KH.DangNhap');
        }
    }

    public function DangXuat()
    {
        Auth::guard('khach_hang')->logout();
        return redirect()->route('home');
    }
}
