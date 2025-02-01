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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->unique();
            $table->string('password');

            $table->string('leader_name');
            $table->string('leader_email')->unique();
            $table->string('member_1')->nullable();
            $table->string('member_1_email')->unique()->nullable();
            $table->string('member_2')->nullable();
            $table->string('member_2_email')->unique()->nullable();
            $table->string('member_3')->nullable();
            $table->string('member_3_email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('leader_whatsapp')->unique();
            $table->string('leader_line')->unique();
            $table->string('leader_github');
            $table->string('leader_birth_place');
            $table->date('leader_birth_date');
            $table->string('leader_cv');
            $table->boolean('status');
            $table->string('leader_card');
            $table->enum('role', ['participant', 'admin'])->default('participant')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

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
