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
        Schema::create('brazil_neighbors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('brazil_states');
            $table->string('estado')->nullable();
            $table->string('estado_sigla')->nullable();
            $table->bigInteger('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('brazil_cities');
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep_inicio')->nullable();
            $table->string('cep_fim')->nullable();
        });

        Artisan::call('db:seed', ['--class' => 'BrazilNeighborsSeed']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brazil_neighbors');
    }
};
