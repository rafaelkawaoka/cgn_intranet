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
        Schema::create('mural_posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('users');
            $table->integer('tipo')->default(1);
            $table->date('data_inicio')->nullable();
            $table->date('data_termino')->nullable();
            $table->string('modalidade')->nullable();
            $table->string('titulo')->nullable();
            $table->longtext('conteudo')->nullable();
            $table->string('link_externo')->nullable();
            $table->string('link_title')->nullable();
            $table->json('users_cientes')->default(json_encode([]));
            $table->json('users_vote_yes')->default(json_encode([]));
            $table->json('users_vote_no')->default(json_encode([]));
            $table->boolean('enquete_end')->default(0);
            $table->boolean('published_teams')->default(0);
            $table->softDeletes();
            $table->datetime('edited_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mural_posts');
    }
};
