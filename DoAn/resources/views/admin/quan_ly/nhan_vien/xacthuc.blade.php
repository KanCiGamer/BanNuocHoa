<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/xacthuc.css') }}">
    <title>Đăng Nhập - NV</title>
    <style>
        body{
            display: flex;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>NV Đăng nhập</h2>
    <form action="{{route('NV.XacNhan')}}" method="POST">
        @csrf
        @if(session('thongBao'))
        <div id="thongbao">
            {{ session('thongBao') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('thongbao').style.display ='none';
            }, 5000);
        </script>
        @endif
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required>
            <label for="password">Mật khẩu</label><br>
            <input type="password" id="password" name="password" required>
            <button type="submit">Đăng nhập</button>
            <a href="{{ route('QTV.DangNhap')}}">Bạn là quản trị viên?</a>
    </form>
</div>
    
</body>
</html>