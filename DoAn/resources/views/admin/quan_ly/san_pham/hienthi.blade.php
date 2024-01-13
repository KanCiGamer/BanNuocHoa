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
    <h1>Danh Sách Sản Phẩm</h1>
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
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sanpham as $value)
                <tr>
                    <td>{{ $value->ma_sp }}</td>
                    <td>{{ $value->ten_sp }}</td>
                    <td style="text-align: center;"><img src="{{ asset('images/'.$value->hinhanh_sp) }}" style="width: 50px;"></td>
                    <td>{{ number_format($value->gia_sp) }} VNĐ</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('TrangSua.SanPham', $value->ma_sp) }}" method="GET">
                                @csrf
                                <button type="submit">Sửa</button>
                            </form>
                            <form action="{{ route('Xoa.SanPham', $value->ma_sp) }}" method="POST">
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
    <div class="hienthi">
        <a href="{{route('TrangThem.SanPham')}}">Thêm sản phẩm</a>
    </div>
    <div class="hienthi">
        <a href="{{route('QTV.QuanLy')}}" class="btn">Trở về</a>
    </div>
</body>
</html>