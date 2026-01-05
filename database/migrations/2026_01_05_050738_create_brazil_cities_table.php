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
        Schema::create('brazil_cities', function (Blueprint $table) {
            $table->id();
            $table->string('cidade');
            $table->bigInteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('brazil_states');
            $table->string('cep_inicio')->nullable();
            $table->string('cep_fim')->nullable();
            $table->boolean('cidade_logradouro')->default(0);
            $table->boolean('capital')->default(0);
        });
        Artisan::call('db:seed', ['--class' => 'BrazilCitiesCepSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brazil_cities');
    }
};
