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
        Schema::create('nha_san_xuats', function (Blueprint $table) {
            $table->char('ma_nsx',5)->primary(); // mã nhà sản xuất
            $table->string('ten_nsx',50)->unique()->nullable(false); // tên nhà sản xuất
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_san_xuats');
    }
};
