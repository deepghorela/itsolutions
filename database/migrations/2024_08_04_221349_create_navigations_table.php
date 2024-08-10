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
        Schema::create('navigations', function (Blueprint $table) {
            $table->id(); // Creates an `unsigned big integer` column named `id` with auto-increment
            $table->string('name', 250)->nullable()->collation('utf8mb4_unicode_ci');
            $table->boolean('status')->default(true); // Tinyint(4) with default '1' mapped to boolean
            $table->timestamps(); // Creates `created_at` and `updated_at` columns
            
            // Indexes
            $table->primary('id'); // Primary key
            $table->index('name');
            $table->index('status'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigations');
    }
};
