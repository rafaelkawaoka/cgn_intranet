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
        Schema::create('japan_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->string('kanji');
        });
         Artisan::call('db:seed', ['--class' => 'JapanProvinces']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('japan_provinces');
    }
};
