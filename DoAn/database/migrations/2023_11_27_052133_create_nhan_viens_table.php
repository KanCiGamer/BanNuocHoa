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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->char('ma_nv',5)->primary();  //mã nhân viên - khóa chính
            $table->string('ten_nv',50)->nullable(false); //tên nhân viên - không để trống
            $table->string('email_nv',50)->unique()->nullable(false); //email nhân viên - không để trống
            $table->string('password')->nullable(false); //mật khẩu - không để trống
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
