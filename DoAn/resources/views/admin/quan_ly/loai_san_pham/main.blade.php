<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css')}}">
    <title>Quản Lý Loại Sản Phẩm</title>
</head>
<body>
    <h1>Danh Sách Loại Sản Phẩm</h1>
    @if(session('thongBao'))
    <div class="alert" id="alert">
        {{ session('thongBao') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('alert').style.display ='none';
        }, 2000);
    </script>
    @endif
    <div class="table">
        <table id="chung">
            <thead>
                <tr>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loaisp as $value)
                <tr>
                    <td>{{ $value->ma_loai }}</td>
                    <td>{{ $value->ten_loai }}</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('TrangSua.LoaiSanPham', $value->ma_loai) }}" method="GET">
                                @csrf
                                <button type="submit">Sửa</button>
                            </form>
                            <form action="{{ route('Xoa.LoaiSanPham', $value->ma_loai) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Xóa</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="main">
        <form action="{{ route('Them.LoaiSanPham')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="value_id">Mã Loại</label><br>
            <input type="text" id="ma_loai" name="ma_loai">
            <br>
            <label for="value_name">Tên Loại</label>
            <br>
            <input type="text" id="ten_loai" name="ten_loai">
            <br>
            <button type="submit">Thêm</button>
        </form>
    </div>
    <div class="hienthi">
        <a href="{{route('QTV.QuanLy')}}" class="btn">Trở về</a>
    </div>
</body>
</html>