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
        Schema::create('mosques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('fajr_time');
            $table->string('dhuhr_time');
            $table->string('asr_time');
            $table->string('maghrib_time');
            $table->string('isha_time');
            $table->string('jummah_time');
            $table->foreignId('user_id')->nullable()->index()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mosques');
    }
};
