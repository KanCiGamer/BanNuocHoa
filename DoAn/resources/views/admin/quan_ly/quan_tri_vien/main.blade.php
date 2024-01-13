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
    <h1>Danh sách quản trị viên</h1>
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
                @foreach ($quantrivien as $value)
                <tr>
                    <td>{{ $value->ma_qtv }}</td>
                    <td>{{ $value->ten_qtv }}</td>
                    <td>{{ $value->email_qtv }}</td>
                    <td>{{ $value->password }}</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('Xoa.QTV', $value->ma_qtv) }}" method="POST">
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
        <form action="{{ route('Them.QTV')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="value_id">Mã QTV</label><br>
            <input type="text" id="ma_qtv" name="ma_qtv">
            <br>
            <label for="value_name">Tên QTV</label>
            <br>
            <input type="text" id="ten_qtv" name="ten_qtv">
            <br>
            <label for="email_qtv">Email QTV</label>
            <br>
            <input type="email" name="email_qtv" id="email_qtv" required>
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