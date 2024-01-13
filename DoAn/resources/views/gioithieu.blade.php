@extends('layout.home-layout')

@section('title', 'KanCi Shop')

@section('nav-bar')
<li><a href="{{ route('home')}}">TRANG CHỦ</a></li>
<li><a href="{{ route('gioithieu')}}" class="active-page">GIỚI THIỆU</a></li>
<li><a href="{{ route('DonHang')}}" >TRA CỨU</a></li>
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
    <div style="text-align: center; margin-top: 120px;">
        <h2 style="text-align: center;margin-bottom: 45px;">GIỚI THIỆU VỀ KANCI SHOP</h2>
        <hr style="width: 25%; margin: auto; border:none; border-top: 3px solid #f00; margin-bottom: 45px;">
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%; margin-bottom: 20px;line-height:1.5;">KanCi Shop (KCS) được thành lập vào năm 2007. Đến nay, với hệ thống 50 cửa hàng được đặt tại trung tâm các thành phố lớn, các trung tâm thương mại cao cấp sầm uất, hiện đại bậc nhất, mỗi ngày thu hút gần 3.000 lượt khách đến tham quan và mua sắm; các website trực tuyến có hơn 15.000 lượt truy cập mỗi ngày, KanCi Shop chính thức trở thành doanh nghiệp phân phối nước hoa và mỹ phẩm chính hãng lớn nhất Việt Nam.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Hiện nay, KCS có hàng ngàn sản phẩm nước hoa cao cấp của hầu hết những thương hiệu thời trang trứ danh như Creed, Initio, Versace, Gucci, Burberry, Dolce & Gabbana, Yves Saint Laurent, Valentino, Lancome,… đáp ứng nhu cầu sử dụng nước hoa ngày càng cao của mọi đối tượng khách hàng. KCS được khách hàng mệnh danh là “Thiên đường sắc đẹp và mùi hương” bởi những điểm ưu việt mà tại Việt Nam chưa có một địa chỉ bán nước hoa, mỹ phẩm nào sánh được như sản phẩm đa dạng, giá cả cạnh tranh, chất lượng đảm bảo chính hãng. Đặc biệt, đội ngũ nhân viên được đào tạo bài bản, chuyên nghiệp, đáp ứng mọi yêu cầu khắt khe của khách hàng.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Trái ngược với suy nghĩ của nhiều người, KanCi Shop không phải là những cửa hàng riêng lẻ mà ngay từ đầu đã hình thành một chuỗi cửa hàng trực thuộc Công ty Cổ phần Thương mại KanCi Shop & Mỹ Phẩm. Năm 2017, công ty Cổ phần Thương mại KanCi Shop & Mỹ Phẩm còn sở hữu thêm thương hiệu Perfume World với chuỗi cửa hàng tọa lạc tại hơn 20 Trung tâm thương mại cao cấp Vincom trên khắp cả nước.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Tuy cùng thuộc công ty Công ty Cổ phần Thương mại KanCi Shop & Mỹ Phẩm nhưng thương hiệu KanCi Shop và Perfume World khác nhau ở chỗ KanCi Shop là hệ thống của những street-shop nằm trên các cung đường trọng yếu của các thành phố; còn Perfume World là hệ thống cửa hàng phân phối nước hoa nằm trong các trung tâm thương mại Vincom hiện đại.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Hơn 10 năm hoạt động trong lĩnh vực phân phối và bán lẻ nước hoa chính hãng, công ty KanCi Shop đã không ngừng nỗ lực mở rộng mạng lưới kinh doanh, tiếp tục vươn lên trở thành nhà phân phối độc quyền thương hiệu nước hoa niche từ Đức Birkholz, thương hiệu nước hoa Parour Pháp, Minus 417 - thương hiệu mỹ phẩm chăm sóc da cao cấp đến từ vùng biển Chết của Israel, Dewytree - thương hiệu mỹ phẩm thiên nhiên từ Hàn Quốc.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Đa dạng hóa thương hiệu là định hướng phát triển trong tương lai của Công ty Cổ phần Thương mại KanCi Shop & Mỹ Phẩm. Không chỉ là nước hoa mà các thương hiệu, sản phẩm thuộc lĩnh vực mỹ phẩm như chăm sóc da, trang điểm, Công ty Cổ phần Thương mại KanCi Shop & Mỹ Phẩm đều muốn tìm tòi, tiếp cận, đánh giá chất lượng, chọn lọc và phân phối tại thị trường Việt Nam, tạo điều kiện cho người tiêu dùng Việt tiếp cận thêm nhiều thương hiệu đẳng cấp.</p>
        <p style="text-align: justify; margin-left:auto; margin-right:auto; width: 80%;margin-bottom: 20px;line-height:1.5;">Chưa dừng lại tại đó, tháng 10 năm 2022, KCS chính thức ra mắt dịch vụ Facial Spa tại KCS Flaship Store nhằm phục vụ nhu cầu làm đẹp của khách hàng một cách tốt nhất. Dịch vụ spa tại KCS không chỉ là nơi chăm sóc sắc đẹp, mà nó còn là nơi giúp khách hàng thư giãn tinh thần, nghỉ ngơi sau những giờ làm việc căng thẳng. Tự hào là Spa đầu tiên và duy nhất có mặt trong hệ thống phân phối nước hoa và mỹ phẩm chính hãng tại Việt Nam, Facial Spa KanCi Shop hứa hẹn sẽ là chìa khóa giúp quý khách hàng lấy lại làn da khỏe mạnh và trở nên tự tin.</p>
    </div>
@endsection