@extends('layout.home-layout')
@section('title', 'KanCi Shop')
@section('nav-bar')
<li><a href="{{ route('home')}}" class="active-page">TRANG CHỦ</a></li>
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
<div class="thumb-container" >
    <div class="slides-container">
        <div class="slide-item">
            <img src="images/tet2.jpg" style="width:100%">
        </div>
        <div class="slide-item">
            <img src="images/tet.png" style="width:100%">
        </div>
        <div class="slide-item">
            <img src="images/tet3.jpg" style="width:100%">
        </div>
        <div class="slide-item">
            <img src="images/tet4.jpeg" style="width:100%">
        </div>
        <div class="slide-item">
            <img src="images/tet5.jpg" style="width:100%">
        </div>
        <a class="prev"><i class="fa-solid fa-chevron-left"></i></a>
        <a class="next"><i class="fa-solid fa-chevron-right"></i></a>
        <div class="dot">
            <span class="dot-select"></span>
            <span class="dot-select"></span>
            <span class="dot-select"></span>
            <span class="dot-select"></span>
            <span class="dot-select"></span>
        </div>
    </div>
</div>
<div>
    
</div>
<div class="container">
    <div class="box-container">
        @foreach ($sanpham as $product)
        <div class="box">
            <div id="anh">
                <a href="{{ route('chitiet', $product->ma_sp) }}">
                    <img src="images/{{$product->hinhanh_sp}}" alt="">
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