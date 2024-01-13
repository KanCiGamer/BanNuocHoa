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
@if(count($sp) <1)
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Không tìm thấy sản phẩm có tên tương ứng</h2>
@elseif(count($sp) == 1)
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Sản phẩm có tên tương tự:</h2>
<div class="container" style="width: 30%;">
    <div class="box-container">
        @foreach ($sp as $product)
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
@elseif(count($sp) == 2)
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Sản phẩm có tên tương tự:</h2>
<div class="container" style="width: 57%;">
    <div class="box-container">
        @foreach ($sp as $product)
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
@elseif(count($sp) == 3)
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Sản phẩm có tên tương tự:</h2>
<div class="container" style="width: 80%;">
    <div class="box-container">
        @foreach ($sp as $product)
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
@else
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Sản phẩm có tên tương tự:</h2>
<div class="container">
    <div class="box-container">
        @foreach ($sp as $product)
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
@endif
<h2 style="text-align: left;margin-top: 125px; margin-left: 50px;margin-bottom: 30px;">Sản phẩm khác:</h2>
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