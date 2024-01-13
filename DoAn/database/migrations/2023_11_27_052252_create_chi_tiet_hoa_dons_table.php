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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->char('ma_hd',10);
            $table->char('ma_sp',10);
            $table->primary(['ma_hd','ma_sp']);
            $table->double('gia_tien')->nullable(false);
            $table->integer('so_luong')->nullable(false);
            $table->foreign('ma_hd')->references('ma_hd')->on('hoa_dons');
            $table->foreign('ma_sp')->references('ma_sp')->on('san_phams');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};
