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
        Schema::create('children_parents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('marital');
            $table->string('tertiary_education');
            $table->string('address');
            $table->string('job');
            $table->string('phone');
            $table->string('salary');
            $table->string('home_status');
            $table->string('number_of_souls');
            $table->string('category_of_souls');
            $table->string('nik');
            $table->string('file_ktp');
            $table->string('file_kk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children_parents');
    }
};
