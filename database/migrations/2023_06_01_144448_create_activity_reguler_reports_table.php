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
        Schema::create('activity_reguler_reports', function (Blueprint $table) {
            $table->id();
            $table->string('five_time_pray');
            $table->string('pray_in_mosque');
            $table->string('pray_ontime');
            $table->string('pray_rawatib');
            $table->string('pray_tahiyatul');
            $table->string('pray_tahajud');
            $table->string('pray_dhuha');
            $table->string('pray_fajr');
            $table->string('pray_hajad');
            $table->string('read_quran');
            $table->string('memorize_quran');
            $table->string('amount_memorize_quran');
            $table->string('fast_sunnah');
            $table->string('infaq_sedekah');
            $table->string('help_parent');
            $table->string('self_study');
            $table->string('team_study');
            $table->string('help_friend');
            $table->string('pray_quran_with_ustadz');
            $table->string('description');
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
        Schema::dropIfExists('activity_reguler_reports');
    }
};
