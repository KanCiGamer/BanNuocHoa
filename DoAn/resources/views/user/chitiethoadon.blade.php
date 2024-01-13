@extends('layout.home-layout')

@section('title', 'KanCi Shop')

@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}">TRA CỨU</a></li>
<li>
    <a href="{{route('HienThi.GioHang')}}">
        <i class="bi bi-bag"></i>
        <span id="so-luong-gio-hang">
            {{-- @if(session('giohang') && is_array(session('giohang'))) --}}
            @if(session('giohang'))
                {{ count(session('giohang')) }}
            @else
                0
            @endif
        </span>
    </a>
</li>
@endsection

@section('noi-dung')
<div id="khung_ket_qua" style="display: flex;flex-direction: column;align-items: center;justify-content: center;
padding: 20px;">
<div id="khung_kq">
<table id="khung_kq_table" style="width:100%;">

    <tr>
        <th colspan='5' style='padding: 25px;'>DANH SÁCH SẢN PHẨM</th>
    </tr>
    <tr>
        <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
    </tr>
    @foreach($hoadon->ChiTietHoaDon as $value)
    <tr>
        <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
    </tr>
        <tr>
            <td rowspan="2" style="padding: 0;"><img src="{{ asset('images/'.$value->SanPham->hinhanh_sp) }}" alt="Product Image" width="50"></td>
            <td colspan="4"><p> {{$value->SanPham->ten_sp}} </p></td>
        </tr>
        
        <tr>
            <td><p>Giá tiền: {{number_format($value->gia_tien)}} VNĐ</p></td><td></td><td></td><td><p>Số lượng: {{$value->so_luong}}</p></td>
        </tr>
        <tr id='boder_bottom'>
            <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
        </tr>
    
    @endforeach

</table>
<div style="margin-top: 20px;text-align:left">
    <div style="padding: 5px; background-color: #F5F5F5;">
        <strong style="font-size: 18px;margin-bottom:5px;">Thông tin khách hàng</strong>
        <p><i class="bi bi-person"></i> {{$hoadon->ten_kh}}</p>
        <p><i class="bi bi-phone"></i> {{$hoadon->so_dien_thoai_hd}}</p>
        <p><i class="bi bi-geo-alt"></i> {{$hoadon->dia_chi_hd}}</p>
        <p><i class="bi bi-envelope"></i> {{$hoadon->email_kh}}</p>
    </div>
    <div style="margin-top: 10px;padding: 5px; background-color: #F5F5F5;">
        <strong style="font-size: 18px;margin-bottom:5px;">Tình trạng hóa đơn</strong>
        <p>Ngày tạo: {{$hoadon->ngay_tao_hd}}</p>
        @if ($hoadon->ngay_giao_hd == $hoadon->ngay_tao_hd)
        <p>Ngày nhận: </p>
        @else
        <p>Ngày nhận: {{$hoadon->ngay_giao_hd}}</p>
        @endif
        
        @if ($hoadon->trang_thai_hd == 0)
        <p>Tình trạng: chưa giao</p>
        @else
        <p>Tình trạng: đã giao</p>
        @endif
    </div>

</div>
<div class="hienthi" style="margin-top:30px;">
    <a style="text-decoration: none; padding:7px; border: 1px solid black;" href="{{route('ThongTin.KhachHang',['ma_kh' => Auth::guard('khach_hang')->user()->ma_kh])}}">Trở về</a>
</div>
</div>
</div>

@endsection