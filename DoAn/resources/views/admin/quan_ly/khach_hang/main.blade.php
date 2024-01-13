<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css')}}">
    <title>Quản Lý Khách Hàng</title>
</head>
<body>
    <h1>Danh Sách Khách Hàng</h1>
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
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($khachhang as $value)
                <tr>
                    <td>{{ $value->ma_kh }}</td>
                    <td>{{ $value->ten_kh }}</td>
                    <td>{{ $value->email_kh }}</td>
                    <td>{{ $value->sodienthoai_kh }}</td>
                    <td class="btn">
                        <div>
                            <form action="{{ route('TrangSua.KH', $value->ma_kh) }}" method="GET">
                                @csrf
                                <button type="submit">Sửa</button>
                            </form>
                            <form action="{{ route('Xoa.KH', $value->ma_kh) }}" method="POST">
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
        <a href="{{route('QTV.QuanLy')}}" class="btn">Trở về</a>
    </div>
</body>
</html>