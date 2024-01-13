<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <title>Quản lý hóa đơn</title>
</head>
<body>
    <h1>Danh Sách Hóa Đơn</h1>
    <div class="table">
        <table id="chung">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tùy chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hoadon as $value)
                <tr>
                    <td>{{ $value->ma_hd }}</td>
                    <td class="btn">
                        <div>
                            @if ($value->trang_thai_hd==0)
                            <form action="{{ route('Duyet.HoaDon', $value->ma_hd) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit">Đã giao</button>
                            </form>
                            @endif

                            <form action="{{ route('ChiTiet.HoaDon2', $value->ma_hd) }}" method="GET">
                                @csrf
                                <button type="submit">Chi tiết</button>
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