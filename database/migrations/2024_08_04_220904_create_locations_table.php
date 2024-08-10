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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('latitude')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('longitude')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('address_1')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('address_2')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('locality')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('landmark')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('city')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('state')->nullable()->collation('utf8mb4_unicode_ci');
            $table->integer('pincode')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('contact_number')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('contact_email')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('contact_person_name')->nullable()->collation('utf8mb4_unicode_ci');
            $table->boolean('is_registered_office')->nullable();
            $table->integer('estd_since')->default(2021);
            $table->string('sub_title')->nullable()->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            $table->text('logo')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('district')->nullable()->collation('utf8mb4_unicode_ci');
            $table->integer('display_order')->nullable();

            $table->primary('id'); // Primary key
            $table->index('is_active');
            $table->index('display_order');
            $table->index('is_registered_office');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};