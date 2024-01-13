<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <script src="{{ asset('js/admin/main.js') }}"></script>
    <title>Quản lý</title>
</head>
<body>
    @if(Auth::guard('quan_tri_vien')->check()||Auth::guard('nhan_vien')->check())
        @if(Auth::guard('quan_tri_vien')->check())
            <div id="dropdown" style="float: right;">
                <button id="dropdown-trigger">
                    <i class="bi bi-person-circle"></i> {{ Auth::guard('quan_tri_vien')->user()->ten_qtv }}
                </button>
                <div id="dropdown-content">
                    <form action="{{ route('QTV.DangXuat') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="bi bi-box-arrow-right"></i> Đăng xuất</button>
                    </form>
                </div>
            </div>
            <div class="item-list">
                <div class="item">
                    <a href="{{route('QuanLy.QTV')}}">QUẢN TRỊ VIÊN</a>
                </div>
                <div class="item">
                    <a href="{{route('QuanLy.NV')}}">NHÂN VIÊN</a>
                </div>
        @else
            <div id="dropdown" style="float: right;">
                <button id="dropdown-trigger">
                    <i class="bi bi-person-circle"></i> {{ Auth::guard('nhan_vien')->user()->ten_nv }}
                </button>
                <div id="dropdown-content">
                    <form action="{{ route('NV.DangXuat') }}" method="POST">
                        @csrf
                        <button type="submit"><i class="bi bi-box-arrow-right"></i> Đăng xuất</button>
                    </form>
                </div>
            </div>
            <div class="item-list">
        @endif
                <div class="item">
                    <a href="{{route('HienThi.SanPham')}}">SẢN PHẨM</a>
                </div>
                <div class="item">
                    <a href="{{route('HienThi.LoaiSanPham')}}">LOẠI SẢN PHẨM</a>
                </div>
                <div class="item">
                    <a href="{{route('HienThi.NhaSanXuat')}}">NHÀ SẢN XUẤT</a>
                </div>
                <div class="item">
                    <a href="{{route('QuanLy.KH')}}">KHÁCH HÀNG</a>
                </div>
                <div class="item">
                    <a href="{{route('HienThi.HoaDon')}}">HÓA ĐƠN</a>
                </div>
            </div>
    @else
        <p>Bạn cần đăng nhập để xem trang này.</p>
    @endif
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClickEventXacThuc("dropdown-trigger","dropdown-content");
    });
</script>
</body>
</html>