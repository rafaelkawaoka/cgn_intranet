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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('gentilico');
            $table->string('gentilicoM');
            $table->string('gentilicoF');
            $table->string('codPais');
            $table->boolean('destaque')->default(0);
            $table->softdeletes();
        });
        Artisan::call('db:seed', ['--class' => 'CountriesSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
