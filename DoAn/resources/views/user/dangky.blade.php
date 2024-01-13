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
<div style="display:flex; align-items:center;justify-content:space-around;">
    <div>
        <form action="{{ route('KH.DangKy') }}" method="POST">
            @csrf
            <div class="dang-ky" style="text-align: left;">
                <h1 style="margin-bottom: 10px;">Đăng Ký</h1>
                <p>Điền đầy đủ thông tin để đăng ký tài khoản.</p>
                <hr>
                
                <label for="ten_kh"><b>Họ và tên</b></label>
                <input type="text" id="ten_kh" name="ten_kh" placeholder="nhập họ tên" required>
               
                <label for="email_kh"><b>Email</b></label>
                @error('email_kh')
                <div id="error-message" style="color: red;">{{ $message }}</div>
                @enderror
                <input type="email" id="email_kh" name="email_kh" placeholder="email của bạn" required>
                
                <label for="sodienthoai_kh">Số điện thoại</label>
                @error('sodienthoai_kh')
                <div id="error-message" style="color: red;">{{ $message }}</div>
                @enderror
                <input type="text" id="sodienthoai_kh" name="sodienthoai_kh" pattern="\d{10}" placeholder="số điện thoại" required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại có 10 chữ số')" oninput="this.setCustomValidity('')">
    
                <label for="diachi_kh">Địa chỉ</label>
                <input type="text" id="diachi_kh" name="diachi_kh" placeholder="địa chỉ hiện tại" required>
    
                <label for="password">Mật khẩu</label>
                @error('password')
                <div id="error-message" style="color: red;">{{ $message }}</div>
                @enderror
                <input type="password" id="password" name="password" placeholder="mật khẩu" required>
    
                <hr>
            
                <button type="submit" class="registerbtn">Đăng ký</button>
              </div>
              
              <div class="dang-ky signin">
                <p>Đã có tài khoản? <a href="{{ route('KH.DangNhap') }}" style="color: #2196F3;
    background-color: unset;
    padding: 0px;
    border-radius: 0px;
    border: 0;
    outline: 0;
    margin-top: 0px;
    box-shadow: none;
    cursor: pointer;
    transition: none;">Đăng nhập</a>.</p>
              </div>
        </form>
    </div>
    <div style="width:400px;font-size:20px;">
        <h3>
            Khách hàng đăng ký mới
        </h3>
        <p style="margin-top: 30px;">
            Nhận quyền truy cập độc quyền vào các giao dịch và sự kiện.
            Lưu các mục yêu thích vào danh sách yêu thích của bạn.
            Lưu các đơn đặt hàng và số theo dõi đơn hàng của bạn.
        </p>
        <p style="margin-top: 20px;">
            Dịch vụ khách hàng <br>
            Bạn cần giúp đỡ? Xin hãy gọi điện đến Hotline: 0931987215
        </p>
    </div>
</div>
@endsection
