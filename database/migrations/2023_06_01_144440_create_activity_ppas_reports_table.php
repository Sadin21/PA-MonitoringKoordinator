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
        Schema::create('activity_ppas_reports', function (Blueprint $table) {
            $table->id();
            $table->string('surah_name');
            $table->string('amount_ayah');
            $table->string('description');
            $table->string('youtube_link');
            $table->string('status');
            $table->foreignId('child_id')->constrained('children')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_ppas_reports');
    }
};
