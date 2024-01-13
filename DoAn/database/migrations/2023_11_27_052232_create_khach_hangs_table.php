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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->char('ma_kh', 10)->primary(); // mã người dùng - khóa chính
            $table->string('ten_kh',50)->nullable(false); //tên người dùng - không để trống
            $table->string('email_kh',50)->unique()->nullable(false); //email người dùng - không để trống / trùng
            $table->char('sodienthoai_kh',10)->unique()->nullable(false); //số điện thoại người đùng - không để trống / trùng
            $table->string('diachi_kh',255)->nullable(false); //địa chỉ - không để trống
            $table->string('password')->nullable(false); //mật khẩu - không để trống
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
