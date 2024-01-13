<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangCTL extends Controller
{
    public function HienThiGioHang()
    {
        // tạo $giohang và lấy dữ liệu từ 'giohang'
        // nếu không có dữ liệu trả về mảng [] (rỗng)
        $giohang = session()->get('giohang', []);
        $tong_gia_tien = 0;
        foreach ($giohang as $value) {
            $tong_gia_tien += $value['thanh_tien'];
        }
        return view('giohang', ['giohang'=>$giohang, 'tong_gia_tien'=>$tong_gia_tien]);
        //dd($giohang);
    }
    
    public function themSPVaoGioHang($ma_sp)
    {
        // 
        $sp = SanPham::find($ma_sp);

        if($sp)
        {      
            $giohang = session()->get('giohang', []);

            // nếu $giohang đã có mã sản phẩm này thì thực hiện
            if(isset($giohang[$ma_sp]))
            {
                // tăng số lượng sản phẩm
                $giohang[$ma_sp]['so_luong']++;
                // tính thành tiền từ đơn giá và số lượng
                $giohang[$ma_sp]['thanh_tien'] = $giohang[$ma_sp]['so_luong']*$giohang[$ma_sp]['gia_sp'];
                
            }
            // nếu $giohang chưa có mã sản phẩm này thì thực hiện
            else{
                // tạo mảng với mã sản phẩm $ma_sp
                $giohang[$ma_sp] = [
                    // lấy các thông tin cần
                    'ma_sp' => $sp->ma_sp,
                    'ten_sp' => $sp->ten_sp,
                    'anh_sp' => $sp->hinhanh_sp,
                    'gia_sp' => $sp->gia_sp,
                    'so_luong' => 1,
                    'thanh_tien'=> $sp->gia_sp,
                ];
            }
            // lưu mảng $giohang đã xử lý ở trên vào session
            session()->put('giohang', $giohang);
            

            // tạo phản hồi chưa dữ liệu json (thằng này dùng để đếm số lượng sản phẩm đang có trong giỏ hàng)
            return response()->json(['so_luong_sp' => count(session('giohang'))]);
        }
    }

    public function TangSoLuong($ma_sp)
    {
        $giohang= session()->get('giohang',[]);

        if(isset($giohang[$ma_sp]))
        {
            $giohang[$ma_sp]['so_luong']++;
            $giohang[$ma_sp]['thanh_tien'] = $giohang[$ma_sp]['so_luong'] * $giohang[$ma_sp]['gia_sp'];
        }
        session()->put('giohang', $giohang);

        return response()->json(['so_luong' => $giohang[$ma_sp]['so_luong'], 'thanh_tien' => number_format($giohang[$ma_sp]['thanh_tien'])]);
    }
    
    public function GiamSoLuong($ma_sp)
    {
    $giohang = session()->get('giohang', []);

    if(isset($giohang[$ma_sp]) && $giohang[$ma_sp]['so_luong'] > 1)
    {
        $giohang[$ma_sp]['so_luong']--;
        $giohang[$ma_sp]['thanh_tien'] = $giohang[$ma_sp]['so_luong'] * $giohang[$ma_sp]['gia_sp'];
    }
    session()->put('giohang', $giohang);
    return response()->json(['so_luong' => $giohang[$ma_sp]['so_luong'], 'thanh_tien' => number_format($giohang[$ma_sp]['thanh_tien'])]);
    }
    public function CapNhatGioHang(Request $thongtin, $ma_sp)
    {
        $giohang = session()->get('giohang', []);

        if(isset($giohang[$ma_sp])) {
            $giohang[$ma_sp]['so_luong'] = $thongtin->so_luong;
        }
    
        session()->put('giohang', $giohang);
    }

    public function xoaSPGioHang($ma_sp)
    {
        $giohang = session()->get('giohang', []);

        if(isset($giohang[$ma_sp])) {
            unset($giohang[$ma_sp]);
        }
    
        session()->put('giohang', $giohang);

        $soluong = count($giohang);
        return response()->json(['so_luong' => $soluong]);
    }
    public function TongGiaTien()
    {
        $giohang = session()->get('giohang',[]);
        $tong_gia_tien = 0;
        foreach($giohang as $value)
        {
            $tong_gia_tien += $value['thanh_tien'];
        }
        return response()->json(['tong_gia_tien' => number_format($tong_gia_tien)]);
    }
}
