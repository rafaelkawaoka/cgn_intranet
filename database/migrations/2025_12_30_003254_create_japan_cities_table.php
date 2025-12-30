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
        Schema::create('japan_cities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('provincia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('japan_provinces');
            $table->string('cidade');
            $table->string('kanji')->nullable();
            $table->boolean('capital')->default(0);
        });
        Artisan::call('db:seed', ['--class' => 'JapanCities']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('japan_cities');
    }
};
