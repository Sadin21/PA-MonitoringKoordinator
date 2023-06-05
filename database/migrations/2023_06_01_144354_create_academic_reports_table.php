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
        Schema::create('academic_reports', function (Blueprint $table) {
            $table->id();
            $table->string('maxScore');
            $table->string('minScore');
            $table->string('meanScore');
            $table->string('status');
            $table->string('file');
            $table->foreignId('child_id')->constrained('children')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_reports');
    }
};
