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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->char('ma_sp',10)->primary();    // id sản phẩm - khóa chính
            $table->string('ten_sp',50)->nullable(false); // tên sản phẩm - không để trống
            $table->text('mota_sp')->nullable(false); // mô tả sản phẩm - không để trống
            $table->string('hinhanh_sp')->nullable(false); // đường dẫn ảnh sản phẩm - không để trống
            $table->double('gia_sp')->nullable(false); //giá sản phẩm - không để trống
            $table->integer('tonkho_sp')->nullable(false); //sản phẩm tồn kho - không để trống
            $table->string('ma_nsx',5); // mã nhà sản xuất
            $table->foreign('ma_nsx')->references('ma_nsx')->on('nha_san_xuats'); // liên kết khóa ngoại đến bảng producers
            $table->string('ma_loai',10); // mã loại
            $table->foreign('ma_loai')->references('ma_loai')->on('loai_san_phams'); // liên kết khóa ngoại đến bảng types
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
