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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('destinations'); // Lưu danh sách địa điểm
            $table->string('images'); // Lưu danh sách ảnh
            $table->integer('number_of_days');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->text('schedule');
            $table->integer('number_of_guests');
            $table->enum('status', ['active', 'canceled', 'finished'])->default('active');
            $table->float('price', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
