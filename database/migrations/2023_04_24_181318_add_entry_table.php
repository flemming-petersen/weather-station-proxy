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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('stations');
            $table->double('temperature')->nullable();
            $table->double('humidity')->nullable();
            $table->double('dew_point')->nullable();
            $table->double('pressure')->nullable();
            $table->double('wind_speed')->nullable();
            $table->double('wind_direction')->nullable();
            $table->double('wind_gust')->nullable();
            $table->double('rain')->nullable();
            $table->double('daily_rain')->nullable();
            $table->double('solarradiation')->nullable();
            $table->double('uv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry');
    }
};
