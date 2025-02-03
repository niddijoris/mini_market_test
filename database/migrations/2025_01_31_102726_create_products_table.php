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
        if (!Schema::hasTable('categories')) { // check if table exists
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->timestamps();
            });
        }

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // fixed typo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
