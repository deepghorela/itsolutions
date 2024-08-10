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
        Schema::create('nav_items', function (Blueprint $table) {
            $table->id(); // Creates an `unsigned big integer` column named `id` with auto-increment
            $table->integer('nav_id')->nullable(); // `nav_id` column with integer type and nullable
            $table->integer('display_order')->nullable(); // `display_order` column with integer type and nullable
            $table->string('name', 255)->nullable()->collation('utf8mb4_unicode_ci'); // `name` column with varchar(255) and nullable
            $table->boolean('open_in_new_tab')->default(false); // `open_in_new_tab` as tinyint(4) with default '0', mapped to boolean
            $table->boolean('is_active')->default(true); // `is_active` as tinyint(4) with default '1', mapped to boolean
            $table->timestamps(); // `created_at` and `updated_at` columns
            $table->text('custom_link')->nullable()->collation('utf8mb4_unicode_ci'); // `custom_link` column with text type and nullable
            $table->integer('parent_nav_id')->nullable(); // `parent_nav_id` column with integer type and nullable
            $table->integer('page_id')->nullable(); // `page_id` column with integer type and nullable
            $table->boolean('show_icon_only')->default(false); // `show_icon_only` as tinyint(4) with default '0', mapped to boolean
            $table->string('icon', 255)->nullable()->collation('utf8mb4_unicode_ci'); // `icon` column with varchar(255) and nullable
            
            // Indexes
            $table->primary('id'); // Primary key
            $table->index('nav_id'); // Primary key
            $table->index('display_order'); // Primary key
            $table->index('is_active'); // Primary key
            $table->index('parent_nav_id'); // Primary key
            $table->index('page_id'); // Primary key
            $table->index('show_icon_only'); // Primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_items');
    }
};
