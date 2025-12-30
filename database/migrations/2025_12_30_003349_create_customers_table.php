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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('sexo')->nullable();
            $table->date('nascimento')->nullable();
            $table->string('matricula')->unique();
            //documentos
            $table->string('cpf')->nullable()->unique();
            //contatos
            $table->string('telefone_celular')->nullable();
            $table->string('telefone_fixo')->nullable();
            $table->string('email')->nullable();
            //localização
            $table->bigInteger('provincia_id')->unsigned()->nullable();
            $table->foreign('provincia_id')->references('id')->on('japan_provinces');
            $table->bigInteger('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('japan_cities');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
