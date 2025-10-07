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
    {Schema::create('chuyen_bays', function (Blueprint $table) {
        $table->id();
        $table->string('ma_chuyen')->unique();
        $table->string('san_bay_di');
        $table->string('san_bay_den');
        $table->dateTime('thoi_gian_di');
        $table->dateTime('thoi_gian_den')->nullable();
        $table->integer('so_ghe')->default(150);          // tổng ghế
        $table->integer('so_ghe_con')->default(150);      // ghế còn trống
        $table->decimal('gia', 10, 2)->default(0);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyen_bays');
    }
};
