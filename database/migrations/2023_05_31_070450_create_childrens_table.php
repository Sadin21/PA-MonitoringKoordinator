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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('status_in_family');
            $table->string('grade');
            $table->string('class');
            $table->string('school');
            $table->string('address');
            $table->string('semester');
            $table->string('status_with_parents');
            $table->string('photo')->nullable();
            $table->string('regis_status');
            $table->foreignId('coordinator_id')->constrained('koordinators');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('parent_id')->constrained('children_parents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childrens');
    }
};
