@extends('layout.home-layout')

@section('title', 'KanCi Shop')

@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}" class="active-page">TRA CỨU</a></li>
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
<div class="chitiet">
    <div class="sanpham">
        <div class="anh">
            <img src="{{ asset('images/'.$sp->hinhanh_sp) }}" alt="">
        </div>
        <div class="thongtin">
            <h1>{{ $sp->ten_sp }}</h1>
            <h2>{{ number_format($sp->gia_sp) }} VNĐ</h2>
            <div style="text-align:left; line-height:2.5;font-size:16px;">
            <p>Mã sản phẩm: {{$sp->ma_sp}}</p>
            <p>Nhà sản xuất: {{$nsx->ten_nsx}}</p>
            <p>Giới tính: {{$loaisp->ten_loai}}</p>
            @if ($sp->tonkho_sp == 0)
                <p>Tình trạng: hết hàng</p>
            @else
                <p>Tình trạng: còn hàng</p>
            @endif
            <p>Gọi đặt hàng: 0946819779</p>
            <p>Vận chuyển: <span style="color: red;">Miễn phí giao hàng ở HCM</span></p>
            </div>
            
            <form action="#">
                <a class="them_sp" href="{{ route('Them.GioHang', $sp->ma_sp)}}" data-id="{{ $sp->ma_sp }}" style="padding: 10px 80px;color: whitesmoke;">Thêm giỏ hàng</a>
            </form>
        </div>
    </div>
</div>
<div style="display:flex;align-items:center;justify-content:center;">
    <div style="margin-top: 45px;text-align:left;width:85%;padding: 20px;background-color: #F5F5F5;">
        <h1 style="margin-bottom:25px;padding-top:15px;">Giới thiệu về sản phẩm</h1>
        <p style="line-height: 1.5;padding-bottom:15px;">{{ $sp->mota_sp }}</p>
    </div>
</div>
<div class="container">
    <div class="box-container">
        @foreach ($spk->random(4) as $product)
        <div class="box">
            <div id="anh">
                <a href="{{ route('chitiet', $product->ma_sp) }}">
                    <img src="{{asset('images/'.$product->hinhanh_sp)}}" alt="">
                </a>
            </div>
            <h3> {{ $product->ten_sp }} </h3>
            <p> {{ number_format($product->gia_sp)}} VNĐ</p>
            <a href="{{ route('Them.GioHang', $product->ma_sp)}}" class="them_sp" data-id="{{ $product->ma_sp }}">Thêm Giỏ Hàng <i class="bi bi-bag"></i></a>
        </div>
        @endforeach
    </div>
</div>

@endsection