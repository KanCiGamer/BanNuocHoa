<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Sửa Sản Phẩm</h1>
    <div class="main">
    <form action="{{route('Sua.SanPham')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ma_sp">Mã sản phẩm:</label><br>
        <input type="text" id="ma_sp" name="ma_sp" value="{{ $sp->ma_sp }}" readonly><br>
        <label for="ten_sp">Tên sản phẩm:</label><br>
        <input type="text" id="ten_sp" name="ten_sp" value="{{ $sp->ten_sp }}"><br>
        <br>
        <label for="mota_sp">Mô tả sản phẩm:</label><br>
        <textarea id="mota_sp" name="mota_sp">{{ $sp->mota_sp }}</textarea>
        <br>
        <label for="gia_sp">Giá tiền</label><br>
        <input type="text" id="gia_sp" name="gia_sp" inputmode="numeric" pattern="[0-9]*" value="{{ $sp->gia_sp }}">
        <br>
        <label for="tonkho_sp">Số lượng trong kho</label><br>
        <input type="text" id="tonkho_sp" name="tonkho_sp" inputmode="numeric" pattern="[0-9]*" value="{{ $sp->tonkho_sp }}">
        <br>
        <div class="caidat">
            <div>
                <label for="ma_nsx">Mã nhà sản xuất</label>
                <select name="ma_nsx" id="ma_nsx">
                    @foreach ($nsx as $value)
                    <option value="{{$value->ma_nsx}}" @if ($sp->ma_nsx == $value->ma_nsx) selected @endif>{{$value->ma_nsx}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="ma_loai">Mã loại sản phẩm</label>
                <select name="ma_loai" id="ma_loai">
                    @foreach ($loaisp as $value)
                    <option value="{{$value->ma_loai}}" @if ($sp->ma_loai == $value->ma_loai) selected @endif>{{$value->ma_loai}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="value_img">Hình ảnh</label><br>
                <input type="file" id="hinhanh_sp" name="hinhanh_sp">
            </div>
        </div>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    </div>
    <div class="hienthi">
        <a href="{{route('HienThi.SanPham')}}" class="btn">Trở về</a>
    </div>
</body>
</html>