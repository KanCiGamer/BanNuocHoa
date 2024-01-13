<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Khách Hàng</title>
</head>
<body>
    <h1>Sửa Khách Hàng</h1>
    <div class="main">
    <form action="{{route('Sua.KH')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ma_kh">Mã KH:</label>
        <br>
        <input type="text" id="ma_kh" name="ma_kh" value="{{ $kh->ma_kh }}" readonly><br>
        <label for="ten_kh">Tên KH:</label>
        <br>
        <input type="text" id="ten_kh" name="ten_kh" value="{{ $kh->ten_kh }}"><br>
        <br>
        <label for="email_kh">Email:</label>
        <br>
        <input type="text" id="email_kh" name="email_kh" value="{{ $kh->email_kh }}"><br>
        <br>
        <label for="sodienthoai_kh">SDT:</label>
        <br>
        <input type="text" id="sodienthoai_kh" name="sodienthoai_kh" value="{{ $kh->sodienthoai_kh }}"><br>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    </div>
    <div class="hienthi">
        <a href="{{route('QuanLy.KH')}}" class="btn">Trở về</a>
    </div>
</body>
</html>