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
        <form action="{{ route('KH.DangNhap') }}" method="POST">
            @csrf
            <div class="dang-ky" style="text-align: left;">
                <h1 style="margin-bottom: 10px;">Đăng Nhập</h1>
                <p>Điền đầy đủ thông tin để đăng nhập tài khoản.</p>
                <hr>
                @if(session('thongBao'))
                <div id="thongbao" style="color:red;">
                    {{ session('thongBao') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('thongbao').style.display ='none';
                    }, 5000);
                </script>
                @endif
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="registerbtn">Đăng nhập</button>
              </div>
              
        </form>
    </div>
    <div style="width:400px;font-size:20px;">
        <h3>
            Khách hàng đăng ký mới
        </h3>
        <p style="margin-top: 30px;">
            Bằng cách tạo tài khoản với KanCi Shop, bạn sẽ có thể di chuyển qua quy trình thanh toán nhanh hơn, 
            lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi đơn hàng của bạn trong tài khoản của bạn và hơn thế nữa.
        </p>
        <p style="margin-top: 20px;">
            <a href="{{ route('KH.DangKy') }}">Đăng ký</a>
        </p>
    </div>
</div>

@endsection