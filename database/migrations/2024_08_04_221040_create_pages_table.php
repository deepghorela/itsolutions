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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->default(1);
            $table->string('title')->collation('utf8mb4_unicode_ci');
            $table->text('excerpt')->nullable()->collation('utf8mb4_unicode_ci');
            $table->text('body')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('image')->nullable()->collation('utf8mb4_unicode_ci');
            $table->string('slug')->collation('utf8mb4_unicode_ci');
            $table->text('meta_description')->nullable()->collation('utf8mb4_unicode_ci');
            $table->text('meta_keywords')->nullable()->collation('utf8mb4_unicode_ci');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('INACTIVE')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
            $table->boolean('use_title_as_heading')->default(true);

            // Indexes
            $table->unique('slug');
            $table->index('status');
            $table->index('use_title_as_heading');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
