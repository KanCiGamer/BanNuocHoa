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
        Schema::create('quan_tri_viens', function (Blueprint $table) {
            $table->char('ma_qtv',5)->primary(); // mã quản trị - khóa chính
            $table->string('ten_qtv',50)->nullable(false); // tên quản trị - không để trống
            $table->string('email_qtv',50)->unique()->nullable(false); //email quản trị - không trùng / trống
            $table->string('password')->nullable(false); // mật khẩu đăng nhập
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quan_tri_viens');
    }
};
