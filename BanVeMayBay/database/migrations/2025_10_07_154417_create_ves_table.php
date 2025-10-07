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
        Schema::create('ves', function (Blueprint $table) {
        $table->id();
        $table->string('ma_ve')->unique();
        $table->foreignId('chuyen_bay_id')->constrained('chuyen_bays')->onDelete('cascade');
        $table->foreignId('khach_hang_id')->constrained('khach_hangs')->onDelete('cascade');
        $table->string('hang_ve')->default('Phổ thông'); // ví dụ: Phổ thông, Thương gia
        $table->decimal('gia', 10, 2);
        $table->enum('trang_thai', ['đã_đặt','đã_hủy','đã_sử_dụng'])->default('đã_đặt');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ves');
    }
};
