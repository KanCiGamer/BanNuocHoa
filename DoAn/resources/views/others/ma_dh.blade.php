@extends('layout.home-layout')

@section('title', 'KanCi Shop')

@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}">ĐƠN HÀNG</a></li>
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
    <div>
    <h3 style="margin-top: 120px;">MÃ HÓA ĐƠN CỦA BẠN</h3>
    <p style="margin:20px;"><span style="color: red;">{{ $ma_hd }}</span> dùng để tra cứu thông tin đơn hàng</p>
    <a href="{{ route('home') }}" style="padding: 10px; margin-top: 10px;">Trở về trang chủ</a>
    </div>
@endsection