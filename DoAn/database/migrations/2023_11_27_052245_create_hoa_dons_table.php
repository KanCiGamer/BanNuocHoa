<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->char('ma_hd',10)->primary();    // mã hóa đơn - khóa chính
            $table->date('ngay_tao_hd')->nullable(false); // ngày tạo hóa đơn - không để trống
            $table->boolean('trang_thai_hd')->nullable(false); // trạng thái hóa đơn (true: đã duyệt / false: chưa duyệt) - không để trống
            $table->string('dia_chi_hd',100)->nullable(false); // địa chỉ trên hóa đơn (địa chỉ giao hàng) - không để trống
            $table->char('so_dien_thoai_hd',10)->nullable(false); // số điện thoại hóa đơn - không để trống
            $table->date('ngay_giao_hd')->nullable(false); // ngày tạo hóa đơn - không để trống
            $table->string('ten_kh',50)->nullable(false); //tên người dùng - không để trống
            $table->string('email_kh',50)->nullable(false); //email người dùng - không để trống / trùng
            $table->string('ma_kh',10)->nullable(); // cột mã khách hàng
            $table->foreign('ma_kh')->references('ma_kh')->on('khach_hangs'); // liên kết mã đến bảng khách hàng (khóa ngoại)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
