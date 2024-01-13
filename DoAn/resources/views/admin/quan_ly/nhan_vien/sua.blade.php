<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý nhân viên</title>
</head>
<body>
    <h1>Sửa nhân viên</h1>
    <div class="main">
    <form action="{{route('Sua.NV')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ma_nv">Mã nhân viên:</label><br>
        <input type="text" id="ma_nv" name="ma_nv" value="{{ $nv->ma_nv }}" readonly><br>
        <label for="ten_nv">Tên nhân viên:</label><br>
        <input type="text" id="ten_nv" name="ten_nv" value="{{ $nv->ten_nv }}"><br>
        <br>
        <label for="email_nv">Email:</label><br>
        <input type="email" id="email_nv" name="email_nv" value="{{ $nv->email_nv }}">
        <br>
        <label for="password">Mật khẩu</label><br>
        <input type="text" id="password" name="password">
        <br>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    </div>
    <div class="hienthi">
        <a href="{{route('QuanLy.NV')}}" class="btn">Trở về</a>
    </div>
</body>
</html>