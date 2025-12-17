<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('is_active')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => "Rafael Kawaoka",
            'username' => "rafael.kawaoka",
            'is_active' => true,
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => "Usuário teste 1",
            'username' => "user.teste1",
            'is_active' => true,
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => "Usuário teste 2",
            'username' => "user.teste2",
            'is_active' => false,
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => "Usuário teste 3",
            'username' => "user.teste3",
            'is_active' => false,
            'password' => bcrypt('123456')
        ]);

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
