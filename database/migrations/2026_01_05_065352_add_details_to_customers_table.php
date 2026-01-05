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
            $table->unsignedBigInteger('occupation_id')->nullable()->after('email');
            $table->foreign('occupation_id')->references('id')->on('occupations');

            $table->string('estado_civil')->nullable()->after('sexo');
            $table->string('escolaridade')->nullable()->after('estado_civil');
            $table->string('idioma')->nullable()->after('escolaridade');

            $table->unsignedBigInteger('pais_nascimento_id')->nullable()->after('cidade_id');
            $table->foreign('pais_nascimento_id')->references('id')->on('countries');

            $table->unsignedBigInteger('estado_nascimento_br_id')->nullable()->after('pais_nascimento_id');
            $table->foreign('estado_nascimento_br_id')->references('id')->on('brazil_states');

            $table->unsignedBigInteger('estado_nascimento_jp_id')->nullable()->after('estado_nascimento_br_id');
            $table->foreign('estado_nascimento_jp_id')->references('id')->on('japan_provinces');

            $table->string('estado_nascimento_outro')->nullable()->after('estado_nascimento_jp_id');

            $table->unsignedBigInteger('cidade_nascimento_br_id')->nullable()->after('estado_nascimento_outro');
            $table->foreign('cidade_nascimento_br_id')->references('id')->on('brazil_cities');

            $table->unsignedBigInteger('cidade_nascimento_jp_id')->nullable()->after('cidade_nascimento_br_id');
            $table->foreign('cidade_nascimento_jp_id')->references('id')->on('japan_cities');

            $table->string('cidade_nascimento_outro')->nullable()->after('cidade_nascimento_jp_id');
        });

        Schema::create('customer_nationality', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_nationality');

        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['occupation_id']);
            $table->dropColumn('occupation_id');
            $table->dropColumn('estado_civil');
            $table->dropColumn('escolaridade');
            $table->dropColumn('idioma');
            $table->dropForeign(['pais_nascimento_id']);
            $table->dropColumn('pais_nascimento_id');
            $table->dropForeign(['estado_nascimento_br_id']);
            $table->dropColumn('estado_nascimento_br_id');
            $table->dropForeign(['estado_nascimento_jp_id']);
            $table->dropColumn('estado_nascimento_jp_id');
            $table->dropColumn('estado_nascimento_outro');
            $table->dropForeign(['cidade_nascimento_br_id']);
            $table->dropColumn('cidade_nascimento_br_id');
            $table->dropForeign(['cidade_nascimento_jp_id']);
            $table->dropColumn('cidade_nascimento_jp_id');
            $table->dropColumn('cidade_nascimento_outro');
        });
    }
};
