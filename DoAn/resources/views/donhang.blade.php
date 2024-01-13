@extends('layout.home-layout')

@section('title', 'KanCi Shop')

@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}" class="active-page">TRA CỨU</a></li>
<li>
    <a href="{{route('HienThi.GioHang')}}">
        <i class="bi bi-bag"></i>
        <span id="so-luong-gio-hang">
            {{-- @if(session('giohang') && is_array(session('giohang'))) --}}
            @if(session('giohang'))
                {{ count(session('giohang')) }}
            @else
                0
            @endif
        </span>
    </a>
</li>
@endsection

@section('noi-dung')
<div class="don-hang" style="margin-top: 120px; text-align: center;">
    <h2 style="margin-bottom: 20px">Tra cứu đơn hàng</h2>
<form id="tim_kiem" method="POST">
    
    <input type="text" id="ma_hd" name="ma_hd" placeholder="Nhập mã hóa đơn">
    <button type="submit" id="xac_nhan"><i class="bi bi-search"></i></button>
</form>
<div id="khung_ket_qua" style="display: flex;flex-direction: column;align-items: center;justify-content: center;
padding: 20px;">
    <div id="ket_qua" style="color: red"></div>
    <div id="khung_kq" style="display: none;">
        <table id="khung_kq_table" style="width:100%;">

        
        </table>
        
        <div style="margin-top: 20px;text-align:left">
            <div style="padding: 5px; background-color: #F5F5F5;">
                <strong style="font-size: 18px;margin-bottom:5px;">Thông tin khách hàng</strong>
                <p><i class="bi bi-person"></i> <span id="kq_ten_kh"></span></p>
                <p><i class="bi bi-phone"></i> <span id="kq_so_dien_thoai_hd"></span></p>
                <p><i class="bi bi-geo-alt"></i> <span id="kq_dia_chi_hd"></span></p>
                <p><i class="bi bi-envelope"></i> <span id="kq_email_kh"></span></p>
            </div>
            <div style="margin-top: 10px;padding: 5px; background-color: #F5F5F5;">
                <strong style="font-size: 18px;margin-bottom:5px;">Tình trạng hóa đơn</strong>
                <p>Ngày tạo: <span id="kq_ngay_tao_hd"></span></p>
                <p>Ngày nhận: <span id="kq_ngay_giao_hd"></span></p>
                <p>Tình trạng: <span id="kq_trang_thai_hd"></span></p>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $("#tim_kiem").on('submit', function(e) {
        e.preventDefault();
        var ma_hd = $("#ma_hd").val();
        $("#ket_qua").html('');
        $("#kq_ngay_tao_hd").html('');
        $("#kq_so_dien_thoai_hd").html('');
        $("#kq_ten_kh").html('');
        $("#kq_email_kh").html('');
        $("#kq_trang_thai_hd").html('');
        $("#kq_ngay_giao_hd").html('');
        $("#kq_dia_chi_hd").html('');
        // $("#khung_kq").hide();

        if (!ma_hd.trim()) {
            $("#ket_qua").html('Mã hóa đơn không được trống!');
            return;
        }
        $.ajax({
            url: '/tracuu/' + ma_hd,
            type: 'GET',
            success: function(response) {
                //$("#khung_kq").hide();
                $("#khung_kq").show();
                $("#kq_ngay_tao_hd").html(response.ngay_tao_hd);
                $("#kq_so_dien_thoai_hd").html(response.so_dien_thoai_hd);
                $("#kq_ten_kh").html(response.ten_kh);
                $("#kq_email_kh").html(response.email_kh);
                $("#kq_dia_chi_hd").html(response.dia_chi_hd);
                if(response.ngay_giao_hd == response.ngay_tao_hd)
                {
                    $("#kq_ngay_giao_hd").html('');
                }
                else{
                    $("#kq_ngay_giao_hd").html(response.ngay_giao_hd);
                }
                if(response.trang_thai_hd == 0)
                {
                    $("#kq_trang_thai_hd").html('chưa giao');
                }
                else{
                    $("#kq_trang_thai_hd").html('đã giao');
                }      
        if(response.chi_tiet_hoa_don)
        {
        console.log(response);
        var table = $("#khung_kq_table");
        table.empty();
        var rowNew = $("<tr></tr>");
        rowNew.append($("<th colspan='5' style='padding: 25px;'>DANH SÁCH SẢN PHẨM</th>"));
        table.append(rowNew);
        var chi_tiet_hoa_don = response.chi_tiet_hoa_don;
        for (var i = 0; i < chi_tiet_hoa_don.length; i++) {
            var san_pham = chi_tiet_hoa_don[i].san_pham;
            var ten_sp = san_pham.ten_sp;
            var anh_sp = san_pham.hinhanh_sp;
            var gia_tien = chi_tiet_hoa_don[i].gia_tien;
            var so_luong = chi_tiet_hoa_don[i].so_luong;

        var RowHTML2 = $("<tr></tr>");
        RowHTML2.append($("<td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>"));
        table.append(RowHTML2);

        var rowHTML = $("<tr></tr>");
        rowHTML.append($("<td rowspan='2' style='padding: 0;'><img src='images/" + anh_sp + "' alt='Product Image' width='50'></td>"));
        rowHTML.append($("<td colspan='4'><p>" + ten_sp + "</p></td>"));
        table.append(rowHTML);

        
        var nextRowHTML = $("<tr></tr>");
        nextRowHTML.append($("<td><p>Giá tiền: "+ gia_tien.toLocaleString('vi-VN', {style : 'currency', currency : 'VND'}).replace("₫", "") +"VNĐ</p></td><td></td><td></td><td><p>Số lượng: " + so_luong + "</p></td>"));
        table.append(nextRowHTML);
        
        var nextRowHTML2 = $("<tr id='boder_bottom'></tr>");
        nextRowHTML2.append($("<td><p>&nbsp</p></td><td></td><td></td><td><p>&nbsp</p></td>"));
        table.append(nextRowHTML2);
        }
    }
            },
            error: function() {
                $("#ket_qua").html('Không tìm thấy thông tin hóa đơn!');
            }

        });
    });
});

</script>

@endsection