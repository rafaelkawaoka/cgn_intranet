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
        Schema::table('customers', function (Blueprint $table) {
            // Documentos
            $table->string('identidade_tipo')->nullable()->after('cpf');
            $table->string('identidade_numero')->nullable()->after('identidade_tipo');
            $table->string('identidade_orgao')->nullable()->after('identidade_numero');
            $table->date('identidade_emissao')->nullable()->after('identidade_orgao');

            $table->string('titulo_eleitor')->nullable()->after('identidade_emissao');
            $table->string('titulo_secao')->nullable()->after('titulo_eleitor');
            $table->string('titulo_zona')->nullable()->after('titulo_secao');
            $table->string('titulo_local')->nullable()->after('titulo_zona');

            $table->string('zayriu_card')->nullable()->after('titulo_local');
            $table->string('habilitacao_japonesa')->nullable()->after('zayriu_card');
            $table->string('passaporte_estrangeiro')->nullable()->after('habilitacao_japonesa');
            $table->date('passaporte_estrangeiro_validade')->nullable()->after('passaporte_estrangeiro');
        });

        Schema::create('customer_phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('numero');
            $table->string('tipo')->nullable(); // Celular, Fixo
            $table->string('observacoes')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('email');
            $table->string('tipo')->nullable();
            $table->timestamps();
        });

        Schema::create('customer_emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->string('parentesco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_emergency_contacts');
        Schema::dropIfExists('customer_emails');
        Schema::dropIfExists('customer_phones');

        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn([
                'identidade_tipo',
                'identidade_numero',
                'identidade_orgao',
                'identidade_emissao',
                'titulo_eleitor',
                'titulo_secao',
                'titulo_zona',
                'titulo_local',
                'zayriu_card',
                'habilitacao_japonesa',
                'passaporte_estrangeiro',
                'passaporte_estrangeiro_validade',
            ]);
        });
    }
};
