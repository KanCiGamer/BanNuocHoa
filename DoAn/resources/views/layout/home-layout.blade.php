<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token()}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donhang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/giohang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/xacthuc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dangnhap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chitiet.css') }}">
   

    <script src="https://kit.fontawesome.com/44be5ec313.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/img-slide.js')}}"></script>
    <script src="{{ asset('js/click-event.js') }}"></script>
    
    <title>@yield('title')</title>
</head>
<body>
    <div id="menu-bar" style="background-color: #EF4040;">
        <a href="{{ route('home')}}" class="logo">Kc</a>
<div style="position: relative;display:inline-block;" id="otimkiem">
    <form action="{{ route('TimKiem.SanPham')}}" method="POST" style="display: flex;">
        @csrf
        <input type="text" name="ten_sp" placeholder="Tìm kiếm..." style="width:400px;border:1px solid black;border-radius:5px; padding:10px;margin:0;padding-right:35px;">
        <button type="submit" style="font-size:18px;position: absolute; right: 10px; top: 9px; width: 20px; border: none; background: none;"><i class="bi bi-search"></i></button>
    </form>
</div>
        <div class="menu-list">
            <ul>
                @yield('nav-bar')
                @if(Auth::guard('khach_hang')->check())
                    <li class="dropdown" style="display: inline-block;">
                        <a href="javascript:void(0)" id="dropbtn" style="cursor: pointer; color: rgb(83, 82, 82);">
                            <i class="bi bi-person-circle"></i> {{ Auth::guard('khach_hang')->user()->ten_kh }}
                        </a>
                        <div id="dropdown-content" style="  display: none;
                        position: absolute;
                        background-color: #f9f9f9;
                        /* min-width: 160px; */
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                        right: 5px;">
                            <form action="{{ route('ThongTin.KhachHang',['ma_kh' => Auth::guard('khach_hang')->user()->ma_kh])}}" method="GET">
                                @csrf
                                <a href="#" onclick="this.closest('form').submit();return false;" style="
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                text-align: left;
                                background-color:white;
                                margin-top:0px;
                                box-shadow:none;"><i class="bi bi-person-circle"></i> &nbsp;Thông tin</a>
                            </form>
                            <form action="{{ route('KH.DangXuat')}}" method="POST">
                                @csrf
                                <a href="#" onclick="this.closest('form').submit();return false;" style="
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                text-align: left;
                                background-color:white;
                                margin-top:0px;
                                box-shadow:none;"><i class="bi bi-box-arrow-right"></i> &nbsp;Đăng xuất</a>
                            </form>
                        </div>
                    </li>
                @else    
                    <li><a href="{{ route('KH.DangNhap')}}">ĐĂNG NHẬP</a></li>
                @endif    
            </ul>
        </div>
    </div>

    <div class="noi-dung" style="margin-top: 60px; text-align: center;">
        @yield('noi-dung')
    </div>

    <div class="footer" style="bottom:0; background-color:rgb(250, 250, 250);">
        <div style="display:flex;justify-content:space-around;align-items:center;">
            <div>
                <div class="social">
                    <a href="https://www.facebook.com/kancigm"><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-discord"></i></a>
                    <a href=""><i class="bi bi-twitch"></i></a>
                </div>
                <div class="list">
                    <a href="#">TRANG CHỦ</a>
                    <a href="#">GIỚI THIỆU</a>
                </div>    
            </div>
            <div class="map" style="border: 1px solid black;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d979.9875529479418!2d106.67712686042604!3d10.738320794801206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad19e7273d%3A0xe8907a50e556d7dd!2zS2hvYSBDw7RuZyBuZ2jhu4cgdGjDtG5nIHRpbg!5e0!3m2!1svi!2s!4v1704417346435!5m2!1svi!2s" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
      <p class="copyright">Nguyễn Nhật Khang - DH52000539 | Nguyễn Thị Linh Chi - DH52000539</p>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {auto_slide();});
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).on('click', '.them_sp', function (e) {
      e.preventDefault();
      var product_id = $(this).data('id');
      $.ajax({
        url: '/them/' + product_id,
        type: 'POST',
        success: function(response) {
          $('#so-luong-gio-hang').text(response.so_luong_sp);
        }
      });
    });
    document.addEventListener("DOMContentLoaded", function() {ClickEvent("dropbtn","dropdown-content");});


    
    window.setTimeout(function() {
    var element = document.getElementById('error-message');
    if (element) {
        element.style.display = 'none';
    }
}, 5000);
    </script>
</body>
</html>