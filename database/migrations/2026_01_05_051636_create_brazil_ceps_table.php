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
        Schema::create('brazil_ceps', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('logradouro')->nullable();
            $table->string('completo')->nullable();
            $table->string('tipo')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->bigInteger('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('brazil_cities');
            $table->string('estado')->nullable()->nullable();
            $table->string('estado_sigla')->nullable();
            $table->bigInteger('estado_id')->unsigned()->nullable();
            $table->foreign('estado_id')->references('id')->on('brazil_states');
        });

        ini_set('memory_limit', '4G');
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep1']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep2']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep3']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep4']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep5']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep6']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep7']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep8']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep9']);
        Artisan::call('db:seed', ['--class' => 'BrazilSeederCep10']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brazil_ceps');
    }
};
