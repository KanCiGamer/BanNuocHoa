@extends('layout.home-layout')

@section('title', 'Giỏ hàng của bạn')
@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}">TRA CỨU</a></li>
<li>
    <a href="{{route('HienThi.GioHang')}}"  class="active-page">
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

<div class="gio-hang">
@if (count($giohang) > 0)
<div id="notnull">
    <table id="giohang">
        <tr>
            <th colspan="5">GIỎ HÀNG CỦA BẠN</th>
        </tr>
        <tr>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tùy chọn</th>
            <th>Thành tiền</th>
        </tr>
        @foreach ($giohang as $value)
        <tr  id="san_pham_{{ $value['ma_sp'] }}">
            <td style="display: flex; justify-content: space-around; text-align: center; align-items: center; border-right: none; border-top: none;">
                <img src="images/{{$value['anh_sp']}}" style="width: 50px;">
                <p>{{$value['ten_sp']}}</p>
            </td>
            <td>{{ number_format($value['gia_sp'])}} VNĐ</td>
            <td>
                <button onclick="GiamSoLuong('{{ $value['ma_sp'] }}')" style="padding: 5px;">-</button>
                <span id="so_luong_{{ $value['ma_sp'] }}">{{$value['so_luong']}}</span>
                <button onclick="TangSoLuong('{{ $value['ma_sp'] }}')" style="padding: 5px;">+</button>
            </td>
            <td>
                <button onclick="XoaSanPham('{{ $value['ma_sp'] }}')" style="padding: 5px;">xóa</button>
            </td>
            <td>
                <span id="thanh_tien_{{ $value['ma_sp'] }}">{{ number_format($value['thanh_tien'])}} VNĐ</span>
            </td>

        </tr>
        @endforeach
        <tr>
            <th colspan="4" style="border-top: none;">Tổng tiền thanh toán:</th>
            <td><span id="tong_gia_tien">{{ number_format($tong_gia_tien) }} VNĐ</span></td>
        </tr>
    </table>

    <div class="hang" style="margin-top: 50px;">
        <div class="col-75">
          <div class="thung">
            <form action="{{ route('ThanhToan.GioHang') }}" method="POST">
                @csrf
              <div class="hang">
                <div class="col-50">
                    <h3 style="margin-bottom: 35px;">THÔNG TIN THANH TOÁN</h3>
                @if(Auth::guard('khach_hang')->check())
                    <label for="ten_kh"><i class="bi bi-person-circle"></i> Họ và tên</label>
                    <input type="text" id="ten_kh" name="ten_kh" value="{{ Auth::guard('khach_hang')->user()->ten_kh }}" required>
                    <label for="email_kh"><i class="bi bi-envelope"></i> Email</label>
                    <input type="email" id="email_kh" name="email_kh" value="{{ Auth::guard('khach_hang')->user()->email_kh }}" required>
                    <label for="dia_chi"><i class="bi bi-person-vcard"></i> Địa chỉ giao hàng</label>
                    <input type="text" id="dia_chi" name="dia_chi" {{ Auth::guard('khach_hang')->user()->diachi_kh }} required>
                    <label for="sdt"><i class="bi bi-telephone"></i> Số điện thoại</label>
                    <input type="text" id="sdt" name="sdt" pattern="\d{10}" value="{{ Auth::guard('khach_hang')->user()->sodienthoai_kh }}" required>
                @else
                    <label for="ten_kh"><i class="bi bi-person-circle"></i> Họ và tên</label>
                    <input type="text" id="ten_kh" name="ten_kh" required>
                    <label for="email_kh"><i class="bi bi-envelope"></i> Email</label>
                    <input type="email" id="email_kh" name="email_kh" required>
                    <label for="dia_chi"><i class="bi bi-person-vcard"></i> Địa chỉ giao hàng</label>
                    <input type="text" id="dia_chi" name="dia_chi" required>
                    <label for="sdt"><i class="bi bi-telephone"></i> Số điện thoại</label>
                    <input type="text" id="sdt" name="sdt" pattern="\d{10}" required>
                @endif

                  {{-- <div class="hang">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input type="text" id="zip" name="zip" placeholder="10001">
                    </div>
                  </div> --}}
                </div>
      
                {{-- <div class="col-50">
                  <h3>Payment</h3>
                  <label for="fname">Accepted Cards</label>
                  <div class="icon-thung">
                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                  </div>
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                  <label for="ccnum">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                  <label for="expmonth">Exp Month</label>
                  <input type="text" id="expmonth" name="expmonth" placeholder="September">
                  <div class="hang">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                  </div>
                </div> --}}
                
              </div>
              <label style="color: red;">
                {{-- <input type="checkbox" checked="checked" name="sameadr">  --}}
                <i class="bi bi-exclamation-circle-fill"></i>Thanh toán bằng tiền mặt khi nhận hàng!
              </label>
              <input type="submit" value="Xác nhận thông tin" class="btn">
            </form>
          </div>
        </div>
      </div>
</div>
<div id="null" style="display: none;">
    <p>Giỏ hàng của bạn chưa có sản phẩm nào</p>
</div>
@else
    <div id="null">
        <p>Giỏ hàng của bạn chưa có sản phẩm nào</p>
    </div>
@endif
</div>
<script>
    function CapNhatTongGiaTien() {
    $.ajax({
        url: '/giohang/tonggiatien',
        type: 'GET',
        success: function(result)
        {
            // Cập nhật tổng giá tiền trên trang
            var tongGiaTienElement = document.getElementById('tong_gia_tien');
            tongGiaTienElement.textContent = result.tong_gia_tien + ' VNĐ';
        },
        error: function(error) {
            console.log(error);
        }
    })
}
    function TangSoLuong(ma_sp)
    {
        $.ajax({
            url: '/giohang/tang/' + ma_sp,
            type: 'PUT',
            success: function(result)
            {
                var soLuongElement = document.getElementById('so_luong_' + ma_sp);
                soLuongElement.textContent = result.so_luong;

                var thanhTienElement = document.getElementById('thanh_tien_' + ma_sp);
                thanhTienElement.textContent = result.thanh_tien + ' VNĐ';

                CapNhatTongGiaTien();
            },
            error: function(error) {
            console.log(error);
        }
        })
    }
    function GiamSoLuong(ma_sp)
    {
        $.ajax({
            url: '/giohang/giam/' + ma_sp,
            type: 'PUT',
            success: function(result)
            {
                var soLuongElement = document.getElementById('so_luong_' + ma_sp);
                soLuongElement.textContent = result.so_luong;

                var thanhTienElement = document.getElementById('thanh_tien_' + ma_sp);
                thanhTienElement.textContent = result.thanh_tien + ' VNĐ';

                CapNhatTongGiaTien();
            },
            error: function(error) {
            console.log(error);
        }
        })
    }
    function XoaSanPham(ma_sp)
    {
        $.ajax({
            url: '/giohang/xoa/' + ma_sp,
            type: 'DELETE',
            success: function(result)
            {
                var sanPhamElement = document.getElementById('san_pham_' + ma_sp);
                sanPhamElement.remove();
                
                var soluong = result.so_luong;
                if(soluong === 0)
                {
                    $('#notnull').hide();
                    $('#null').show();
                }

                CapNhatTongGiaTien();

            },
            error: function(error) {
            console.log(error);
        }
        })
    }
</script>
@endsection