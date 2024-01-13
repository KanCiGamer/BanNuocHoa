<?php

use App\Http\Controllers\GioHangCTL;
use App\Http\Controllers\HoaDonCTL;
use App\Http\Controllers\LoaiSanPhamCTL;
use App\Http\Controllers\MaLoaiVaNSXCTL;
use App\Http\Controllers\NhaSanXuatCTL;
use App\Http\Controllers\TrangChuCTL;
use App\Http\Controllers\SanPhamCTL;

use App\Http\Controllers\QuanTriVienCTL;
use App\Http\Controllers\XacThucQuanTriVienCTL;
use App\Http\Controllers\NhanVienCTL;
use App\Http\Controllers\XacThucNhanVienCTL;
use App\Http\Controllers\KhachHangCTL;
use App\Http\Controllers\ThanhToanCTL;
use App\Http\Controllers\XacThucKhachHangCTL;

use Illuminate\Support\Facades\Route;

/* 
GET: Phương thức này được sử dụng để lấy thông tin từ máy chủ. 
Ví dụ, khi bạn truy cập một trang web, trình duyệt của bạn sẽ gửi một yêu cầu GET đến máy chủ để lấy trang đó.

POST: Phương thức này được sử dụng để gửi dữ liệu đến máy chủ. 
Ví dụ, khi bạn điền vào một form trên một trang web và nhấn nút gửi, trình duyệt của bạn sẽ gửi một yêu cầu 
POST đến máy chủ với dữ liệu bạn đã nhập vào form.

PUT: Phương thức này cũng được sử dụng để gửi dữ liệu đến máy chủ, 
nhưng nó được sử dụng khi bạn muốn cập nhật dữ liệu hiện có. Ví dụ, nếu bạn muốn cập nhật thông tin cá nhân của mình trên một trang web, 
trình duyệt của bạn có thể gửi một yêu cầu PUT đến máy chủ với thông tin mới.

DELETE: Phương thức này được sử dụng để xóa dữ liệu từ máy chủ. 
Ví dụ, nếu bạn muốn xóa tài khoản của mình trên một trang web, trình duyệt của bạn có thể gửi một yêu cầu DELETE đến máy chủ.

PATCH: Phương thức này tương tự như PUT, nhưng nó chỉ cập nhật một phần của dữ liệu hiện có, thay vì cập nhật toàn bộ dữ liệu.

HEAD: Phương thức này tương tự như GET, nhưng nó chỉ yêu cầu phần tiêu đề của một tài nguyên, thay vì toàn bộ tài nguyên.

OPTIONS: Phương thức này được sử dụng để lấy thông tin về các phương thức HTTP mà máy chủ hỗ trợ.
*/
Route::get('/', [TrangChuCTL::class, 'HienThiSanPham'])->name('home');

    /*
    + Chi tiết sản phẩm
    */
Route::get('/chitiet/{ma_sp}', [SanPhamCTL::class, 'ChiTietSanPham'])->name('chitiet'); 

Route::get('/gioithieu', function(){return view ('gioithieu');})->name('gioithieu'); 
    /*
    + Tìm kiếm sản phẩm
    */
Route::post('/timkiem', [SanPhamCTL::class, 'TimKiem'])->name('TimKiem.SanPham');
    /*
    + Thêm sản phẩm vào giỏ hàng
    + Hiển thị giỏ hàng
    + Tăng số lượng sản phẩm
    + Giảm số lượng sản phẩm
    + Tổng giá tiền của giỏ hàng
    */
Route::post('/them/{ma_sp}', [GioHangCTL::class, 'ThemSPVaoGioHang'])->name('Them.GioHang');
Route::get('/giohang', [GioHangCTL::class, 'HienThiGioHang'])->name('HienThi.GioHang');
Route::put('/giohang/tang/{ma_sp}', [GioHangCTL::class, 'TangSoLuong'])->name('Tang.GioHang');
Route::put('/giohang/giam/{ma_sp}', [GioHangCTL::class, 'GiamSoLuong'])->name('Giam.GioHang');
Route::delete('/giohang/xoa/{ma_sp}', [GioHangCTL::class, 'xoaSPGioHang'])->name('Xoa.GioHang');
Route::get('/giohang/tonggiatien', [GioHangCTL::class, 'TongGiaTien'])->name('TongGiaTien.GioHang');

    /*
    + Thanh toán
    */
Route::post('/thanhtoan', [ThanhToanCTL::class, 'ThanhToan'])->name('ThanhToan.GioHang');

    /*
    + Kiểm tra đơn hàng / tìm kiếm
    */
Route::get('/tracuu', function () {return view('donhang');})->name('DonHang');
Route::get('/tracuu/{ma_hd}', [HoaDonCTL::class, 'TimKiem'])->name('TimKiem.DonHang');
// xóa cột nhân viên trong hóa đơn


    /*
    + Hiển thị trang đăng nhập QTV
    + Đăng nhập
    */
Route::get('/admin/dangnhap', function(){return view('admin.xacthuc');})->name('QTV.DangNhap');
Route::post('/admin/dangnhap', [XacThucQuanTriVienCTL::class, 'DangNhap'])->name('QTV.XacNhan');

    /*
    + Hiển thị trang đăng nhập NV
    + Đăng nhập
    */
Route::get('/staff/dangnhap', function(){return view('admin.quan_ly.nhan_vien.xacthuc');})->name('NV.DangNhap');
Route::post('/staff/dangnhap', [XacThucNhanVienCTL::class, 'DangNhap'])->name('NV.XacNhan');
    
    /*
    + Hiển thị trang đăng nhập KH
    + Đăng nhập
    + Hiển thị trang đăng ký KH
    + Đăng ký
    */
Route::get('/dangnhap', function(){return view('user.xacthuc');})->name('KH.DangNhap');
Route::post('/dangnhap', [XacThucKhachHangCTL::class, 'DangNhap']);
Route::get('/dangky', function(){return view('user.dangky');})->name('KH.DangKy');
Route::post('/dangky', [XacThucKhachHangCTL::class, 'DangKy']);
Route::post('/dangxuat',[XacThucKhachHangCTL::class, 'DangXuat'])->name('KH.DangXuat');


// cài đặt cho các trang


Route::group(['middleware'=>['XacMinh.KhachHang']],function()
{
    Route::get('/canhan/{ma_kh}', [KhachHangCTL::class, 'ThongTinKhachHang'])->name('ThongTin.KhachHang');
    Route::put('/canhan/{ma_kh}', [KhachHangCTL::class, 'CapNhatKhachHang'])->name('CapNhat.ThongTin');
    Route::get('/chitiethoadon/{ma_hd}', [HoaDonCTL::class, 'ChiTiet'])->name('ChiTiet.HoaDon');
});

Route::group(['middleware'=>['XacMinh.QTV.NV']], function() //,'XacMinh.NhanVien'
{   

    /*
    + Hiển thị trang quản lý chung
    + Đăng xuất tài khoản QTV
    + Đăng xuất tài khoản QTV
    */
    Route::get('/quanly', function(){return view('admin.quan_ly.main');})->name('QTV.QuanLy');
    Route::post('/quanly', [XacThucQuanTriVienCTL::class, 'DangXuat'])->name('QTV.DangXuat');
    Route::post('/quanly/nv-dangxuat',[XacThucNhanVienCTL::class, 'DangXuat'])->name('NV.DangXuat');
    /*
    + Hiển thị trang danh sách quản trị viên
    + Thêm quản trị viên
    + Xóa quản trị viên
    */
    Route::get('/quanly/qtv',[QuanTriVienCTL::class, 'HienThiQTV'])->name('QuanLy.QTV');
    Route::post('/quanly/qtv', [QuanTriVienCTL::class, 'ThemQuanTriVien'])->name('Them.QTV');
    Route::delete('/quanly/qtv/{ma_qtv}', [QuanTriVienCTL::class, 'XoaQuanTriVien'])->name('Xoa.QTV');

    /*
    + Hiển thị trang danh sách nhân viên
    + Thêm nhân viên
    + Xóa nhân viên
    + Hiển thị trang sửa nhân viên
    + Sửa nhân viên
    */
    Route::get('/quanly/nv',[NhanVienCTL::class, 'HienThiNV'])->name('QuanLy.NV');
    Route::post('/quanly/nv', [NhanVienCTL::class, 'ThemNhanVien'])->name('Them.NV');
    Route::delete('/quanly/nv/{ma_nv}', [NhanVienCTL::class, 'XoaNhanVien'])->name('Xoa.NV');
    Route::get('/quanly/nv/sua/{ma_nv}',[NhanVienCTL::class, 'TrangSuaNhanVien'])->name('TrangSua.NV');
    Route::put('/quanly/nv/sua', [NhanVienCTL::class, 'SuaNhanVien'])->name('Sua.NV');

    /*
    + Hiển thị trang danh sách khách hàng
    + Xóa khách hàng
    + Hiển thị trang sửa khách hàng
    + Sửa khách hàng
    */
    Route::get('/quanly/kh',[KhachHangCTL::class, 'HienThiKH'])->name('QuanLy.KH');
    Route::delete('/quanly/kh/{ma_nv}', [KhachHangCTL::class, 'XoaKhachHang'])->name('Xoa.KH');
    Route::get('/quanly/kh/sua/{ma_nv}',[KhachHangCTL::class, 'TrangSuaKhachHang'])->name('TrangSua.KH');
    Route::put('/quanly/kh/sua', [KhachHangCTL::class, 'SuaKhachHang'])->name('Sua.KH');

    /*
    + Hiển thị trang danh sách sản phẩm
    + Hiển thị trang thêm sản phẩm
    + Thêm sản phẩm
    + Xóa sản phẩm
    + Hiển thị trang sửa sản phẩm
    + Sửa sản phẩm
    */
    Route::get('/quanly/sanpham/hienthi', [SanPhamCTL::class, 'HienThiSanPham'])->name('HienThi.SanPham');
    Route::get('/quanly/sanpham/them', [MaLoaiVaNSXCTL::class, 'HienThiMaLoaiVaNSX'])->name('TrangThem.SanPham');
    Route::post('/quanly/sanpham/them', [SanPhamCTL::class, 'ThemSanPham'])->name('Them.SanPham');
    Route::delete('/quanly/sanpham/hienthi/{ma_sp}', [SanPhamCTL::class, 'XoaSanPham'])->name('Xoa.SanPham');
    Route::get('/quanly/sanpham/sua/{ma_sp}',[SanPhamCTL::class, 'TrangSuaSanPham'])->name('TrangSua.SanPham');
    Route::put('/quanly/sanpham/sua', [SanPhamCTL::class, 'SuaSanPham'])->name('Sua.SanPham');

    /*
    + Hiển thị trang danh sách loại sản phẩm
    + Thêm loại sản phẩm
    + Xóa loại sản phẩm
    + Hiển thị trang sửa loại sản phẩm
    + Sửa loại sản phẩm
    */
    Route::get('/quanly/loaisanpham/hienthi', [LoaiSanPhamCTL::class, 'HienThiLoaiSanPham'])->name('HienThi.LoaiSanPham');
    Route::post('/quanly/loaisanpham/hienthi', [LoaiSanPhamCTL::class, 'ThemLoaiSanPham'])->name('Them.LoaiSanPham');
    Route::delete('/quanly/loaisanpham/hienthi/{ma_loai}', [LoaiSanPhamCTL::class, 'XoaLoaiSanPham'])->name('Xoa.LoaiSanPham');
    Route::get('/quanly/loaisanpham/sua/{ma_loai}',[LoaiSanPhamCTL::class, 'TrangSuaLoaiSanPham'])->name('TrangSua.LoaiSanPham');
    Route::put('/quanly/loaisanpham/sua', [LoaiSanPhamCTL::class, 'SuaLoaiSanPham'])->name('Sua.LoaiSanPham');

    /*
    + Hiển thị trang danh sách nhà sản xuất
    + Thêm nhà sản xuất
    + Xóa nhà sản xuất
    + Hiển thị trang sửa nhà sản xuất
    + Sửa nhà sản xuất
    */
    Route::get('/quanly/nhasanxuat/hienthi', [NhaSanXuatCTL::class, 'HienThiNhaSanXuat'])->name('HienThi.NhaSanXuat');
    Route::post('/quanly/nhasanxuat/hienthi', [NhaSanXuatCTL::class, 'ThemNhaSanXuat'])->name('Them.NhaSanXuat');
    Route::delete('/quanly/nhasanxuat/hienthi/{ma_nsx}', [NhaSanXuatCTL::class, 'XoaNhaSanXuat'])->name('Xoa.NhaSanXuat');
    Route::get('/quanly/nhasanxuat/sua/{ma_loai}',[NhaSanXuatCTL::class, 'TrangSuaNhaSanXuat'])->name('TrangSua.NhaSanXuat');
    Route::put('/quanly/nhasanxuat/sua', [NhaSanXuatCTL::class, 'SuaNhaSanXuat'])->name('Sua.NhaSanXuat');

    /*
    + Hiển thị trang danh sách hóa đơn
    + Chi tiết hóa đơn
    + Duyệt Hóa đơn đã giao
    */
    Route::get('/quanly/hoadon/hienthi', [HoaDonCTL::class, 'DanhSachHoaDon'])->name('HienThi.HoaDon');
    Route::get('/quanly/hoadon/chitiet/{ma_hd}', [HoaDonCTL::class, 'ChiTietHoaDon'])->name('ChiTiet.HoaDon2');
    Route::put('/quanly/hoadon/{ma_hd}', [HoaDonCTL::class, 'DuyetHoaDon'])->name('Duyet.HoaDon');
});


