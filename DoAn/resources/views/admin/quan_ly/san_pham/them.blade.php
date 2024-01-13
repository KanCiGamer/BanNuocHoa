<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Thêm Sản Phẩm</h1>
    <div class="main">
        <form action="{{ route('Them.SanPham')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="value_id">Mã sản phẩm</label><br>
            <input type="text" id="ma_sp" name="ma_sp">
            <br>
            <label for="value_name">Tên sản phẩm</label>
            <br>
            @if(session('thongBao'))
    <div class="alert" id="alert" style="color: red;">
        {{ session('thongBao') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alert').style.display ='none';
        }, 2000);
    </script>
    @endif  
            <input type="text" id="ten_sp" name="ten_sp">
            <br>
            <label for="description">Mô tả sản phẩm:</label><br>
            <textarea id="mota_sp" name="mota_sp"></textarea>
            <br>
            <label for="value_price">Giá tiền</label><br>
            <input type="text" id="gia_sp" name="gia_sp" inputmode="numeric" pattern="[0-9]*">
            <br>
            <label for="inventory_value">Số lượng trong kho</label><br>
            <input type="text" id="tonkho_sp" name="tonkho_sp" inputmode="numeric" pattern="[0-9]*">
            <br>
            <div class="caidat">
                <div>
                    <label for="producer_id">Mã nhà sản xuất</label>
                    <select name="ma_nsx" id="ma_nsx">
                        @foreach ($nsx as $value)
                        <option value="{{$value->ma_nsx}}">{{$value->ma_nsx}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="type_id">Mã loại sản phẩm</label>
                    <select name="ma_loai" id="ma_loai">
                        @foreach ($loaisp as $value)
                        <option value="{{$value->ma_loai}}">{{$value->ma_loai}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="value_img">Hình ảnh</label><br>
                    <input type="file" id="hinhanh_sp" name="hinhanh_sp">
                </div>
            </div>
            <br>
            <button type="submit">Thêm</button>
        </form>
    </div>
    <div class="hienthi">
        <a href="{{route('HienThi.SanPham')}}" class="btn">Trở về</a>
    </div>
</body>
</html>