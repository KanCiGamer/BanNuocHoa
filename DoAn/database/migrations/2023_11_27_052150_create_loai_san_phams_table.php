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
        Schema::create('loai_san_phams', function (Blueprint $table) {
            $table->char('ma_loai',10)->primary(); // mã loại
            $table->string('ten_loai',20)->unique()->nullable(false);   // tên loại
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_san_phams');
    }
};
