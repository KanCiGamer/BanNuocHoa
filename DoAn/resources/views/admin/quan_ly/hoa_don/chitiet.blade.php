<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/chung/chung.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donhang.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/44be5ec313.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        *{
            font-family: "Poppins", sans-serif;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
    <title>Chi Tiết Hóa Đơn</title>
</head>
<body>
    <div id="khung_ket_qua" style="display: flex;flex-direction: column;align-items: center;justify-content: center;
padding: 20px;">
<div id="khung_kq">
<table id="khung_kq_table" style="width:100%; text-align:center;">

    <tr>
        <th colspan='5' style='padding: 25px;'>DANH SÁCH SẢN PHẨM</th>
    </tr>
    <tr>
        <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
    </tr>
    @foreach($hoadon->ChiTietHoaDon as $value)
    <tr>
        <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
    </tr>
        <tr>
            <td rowspan="2" style="padding: 0;"><img src="{{ asset('images/'.$value->SanPham->hinhanh_sp) }}" alt="Product Image" width="50"></td>
            <td colspan="4"><p> {{$value->SanPham->ten_sp}} </p></td>
        </tr>
        
        <tr>
            <td><p>Giá tiền: {{number_format($value->gia_tien)}} VNĐ</p></td><td></td><td></td><td><p>Số lượng: {{$value->so_luong}}</p></td>
        </tr>
        <tr id='boder_bottom'>
            <td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>
        </tr>
    
    @endforeach

</table>
<div style="margin-top: 20px;text-align:left">
    <div style="padding: 5px; background-color: #F5F5F5;">
        <strong style="font-size: 18px;margin-bottom:5px;">Thông tin khách hàng</strong>
        <p><i class="bi bi-person"></i> {{$hoadon->ten_kh}}</p>
        <p><i class="bi bi-phone"></i> {{$hoadon->so_dien_thoai_hd}}</p>
        <p><i class="bi bi-geo-alt"></i> {{$hoadon->dia_chi_hd}}</p>
        <p><i class="bi bi-envelope"></i> {{$hoadon->email_kh}}</p>
    </div>
    <div style="margin-top: 10px;padding: 5px; background-color: #F5F5F5;">
        <strong style="font-size: 18px;margin-bottom:5px;">Tình trạng hóa đơn</strong>
        <p>Ngày tạo: {{$hoadon->ngay_tao_hd}}</p>
        @if ($hoadon->ngay_giao_hd == $hoadon->ngay_tao_hd)
        <p>Ngày nhận: </p>
        @else
        <p>Ngày nhận: {{$hoadon->ngay_giao_hd}}</p>
        @endif
        
        @if ($hoadon->trang_thai_hd == 0)
        <p>Tình trạng: chưa giao</p>
        @else
        <p>Tình trạng: đã giao</p>
        @endif
    </div>

</div>
<div class="hienthi" style="margin-top:30px;">
    <a href="{{route('HienThi.HoaDon')}}">Trở về</a>
</div>
</div>
</div>
</body>
</html>