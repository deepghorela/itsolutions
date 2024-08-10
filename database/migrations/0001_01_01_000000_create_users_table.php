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
            $table->bigIncrements('id');
            $table->string('name', 250);
            $table->string('email', 250)->unique();
            $table->string('avatar', 250)->default('users/default.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 750);
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('address_1', 255)->nullable();
            $table->string('address_2', 255)->nullable();
            $table->string('landmark', 255)->nullable();
            $table->integer('pincode')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('phone', 10)->nullable();
            $table->tinyInteger('login_blocked')->default(0);
            $table->string('login_block_reason', 200)->nullable();
            $table->string('business_name', 250)->nullable();
            $table->string('mobile', 250);
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
