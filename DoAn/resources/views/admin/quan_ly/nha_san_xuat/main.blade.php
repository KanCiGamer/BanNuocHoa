<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css')}}">
    <title>Quản Lý Nhà Sản Xuất</title>
</head>
<body>
    <h1>Danh Sách Nhà Sản Xuất</h1>
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
                    <th>Mã nhà sản xuất</th>
                    <th>Tên nhà sản xuất</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nhasanxuat as $value)
                <tr>
                    <td>{{ $value->ma_nsx }}</td>
                    <td>{{ $value->ten_nsx }}</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('TrangSua.NhaSanXuat', $value->ma_nsx) }}" method="GET">
                                @csrf
                                <button type="submit">Sửa</button>
                            </form>
                            <form action="{{ route('Xoa.NhaSanXuat', $value->ma_nsx) }}" method="POST">
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
        <form action="{{ route('Them.NhaSanXuat')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="value_id">Mã nhà sản xuất</label><br>
            <input type="text" id="ma_nsx" name="ma_nsx">
            <br>
            <label for="value_name">Tên nhà sản xuất</label>
            <br>
            <input type="text" id="ten_nsx" name="ten_nsx">
            <br>
            <button type="submit">Thêm</button>
        </form>
    </div>
    <div class="hienthi">
        <a href="{{route('QTV.QuanLy')}}" class="btn">Trở về</a>
    </div>
</body>
</html>