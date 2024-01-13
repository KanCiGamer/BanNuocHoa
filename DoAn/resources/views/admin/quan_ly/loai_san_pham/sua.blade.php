<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Loại Sản Phẩm</title>
</head>
<body>
    <h1>Sửa Loại Sản Phẩm</h1>
    <div class="main">
    <form action="{{route('Sua.LoaiSanPham')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ma_sp">Mã loại:</label><br>
        <input type="text" id="ma_loai" name="ma_loai" value="{{ $loaisp->ma_loai }}" readonly><br>
        <label for="ten_sp">Tên loại:</label><br>
        <input type="text" id="ten_loai" name="ten_loai" value="{{ $loaisp->ten_loai }}"><br>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    </div>
    <div class="hienthi">
        <a href="{{route('HienThi.LoaiSanPham')}}" class="btn">Trở về</a>
    </div>
</body>
</html>