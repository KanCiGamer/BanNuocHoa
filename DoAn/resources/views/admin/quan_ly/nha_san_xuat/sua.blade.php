<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Nhà Sản Xuất</title>
</head>
<body>
    <h1>Sửa Nhà Sản Xuất</h1>
    <div class="main">
    <form action="{{route('Sua.NhaSanXuat')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ma_sp">Mã nhà sản xuất:</label><br>
        <input type="text" id="ma_nsx" name="ma_nsx" value="{{ $nsx->ma_nsx }}" readonly><br>
        <label for="ten_sp">Tên nhà sản xuất:</label><br>
        <input type="text" id="ten_nsx" name="ten_nsx" value="{{ $nsx->ten_nsx }}"><br>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    </div>
    <div class="hienthi">
        <a href="{{route('HienThi.NhaSanXuat')}}" class="btn">Trở về</a>
    </div>
</body>
</html>