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
        Schema::create('brazil_states', function (Blueprint $table) {
            $table->id();
            $table->string('estado');
            $table->string('sigla');
        });
        Artisan::call('db:seed', ['--class' => 'BrazilStatesSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brazil_states');
    }
};
