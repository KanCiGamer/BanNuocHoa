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
<div style="display:flex;justify-content: space-around;margin-top:120px;">
    <div id="thongtincanhan" style="width:40%">
        <h2 style="margin-bottom:30px;">THÔNG TIN CÁ NHÂN</h2>
        <form action="{{ route('CapNhat.ThongTin',['ma_kh' => Auth::guard('khach_hang')->user()->ma_kh])}}" method="POST" style="width:75%;">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ten_kh">Tên khách hàng:</label>
                <input type="text" id="ten_kh" name="ten_kh" value="{{ $khachhang->ten_kh }}">
            </div>
            <div class="form-group">
                <label for="email_kh">Email:</label>
                <input type="email" id="email_kh" name="email_kh" value="{{ $khachhang->email_kh }}" readonly>
            </div>
            <div class="form-group">
                <label for="sodienthoai_kh">Số điện thoại:</label>
                <input type="text" id="sodienthoai_kh" name="sodienthoai_kh" value="{{ $khachhang->sodienthoai_kh }}" readonly>
            </div>
            <div class="form-group">
                <label for="diachi_kh">Địa chỉ:</label>
                <input type="text" id="diachi_kh" name="diachi_kh" value="{{ $khachhang->diachi_kh }}">
            </div>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
    <div id="ds_hd" style="width:35%;height: 400px;overflow: auto;">
        <h2 style="margin-bottom:30px;">LỊCH SỬ HÓA ĐƠN</h2>
        @if($hoadon->count() > 0)
        @foreach ($hoadon as $value)
            <div style="display:flex;justify-content: space-between; margin-bottom:40px">
                <p>Mã hóa đơn: {{ $value->ma_hd }}</p>
                <a href="{{ route('ChiTiet.HoaDon', ['ma_hd' => $value->ma_hd]) }}">Chi tiết</a>
            </div>
        @endforeach
    @else
        <p>Không có hóa đơn nào.</p>
    @endif
    
    </div>
</div>


@endsection

