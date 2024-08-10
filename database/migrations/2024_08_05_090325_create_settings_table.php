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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id'); // Equivalent to `int(10) unsigned NOT NULL AUTO_INCREMENT`
            $table->string('key')->unique(); // Equivalent to `varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL` with a unique key constraint
            $table->string('display_name'); // Equivalent to `varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL`
            $table->text('value')->nullable(); // Equivalent to `text COLLATE utf8mb4_unicode_ci`
            $table->text('details')->nullable(); // Equivalent to `text COLLATE utf8mb4_unicode_ci`
            $table->string('type'); // Equivalent to `varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL`
            $table->integer('order')->default(1); // Equivalent to `int(11) NOT NULL DEFAULT '1'`
            $table->string('group')->nullable(); // Equivalent to `varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL`
            $table->timestamps(); // Adds `created_at` and `updated_at` columns

            $table->primary('id');
            $table->index('key');
            $table->index('type');
            $table->index('order');
            $table->index('display_name');
            $table->index('group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
