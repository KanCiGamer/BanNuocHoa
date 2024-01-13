<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách nhân viên</h1>
    <div class="table">
        <table id="chung">
            <thead>
                <tr>    
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nhanvien as $value)
                <tr>
                    <td>{{ $value->ma_nv }}</td>
                    <td>{{ $value->ten_nv }}</td>
                    <td>{{ $value->email_nv }}</td>
                    <td>{{ $value->password }}</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('TrangSua.NV', $value->ma_nv) }}" method="GET">
                                @csrf
                                <button type="submit">Sửa</button>
                            </form>
                            <form action="{{ route('Xoa.NV', $value->ma_nv) }}" method="POST">
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
        <form action="{{ route('Them.NV')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="value_id">Mã NV</label><br>
            <input type="text" id="ma_nv" name="ma_nv">
            <br>
            <label for="value_name">Tên NV</label>
            <br>
            <input type="text" id="ten_nv" name="ten_nv">
            <br>
            <label for="email_nv">Email NV</label>
            <br>
            <input type="email" name="email_nv" id="email_nv" required>
            <br>
            <label for="value_price">Mật khẩu</label><br>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Thêm</button>
        </form>
    </div>
    <div class="hienthi">
        <a href="{{route('QTV.QuanLy')}}" class="btn">Trở về</a>
    </div>
</body>
</html>