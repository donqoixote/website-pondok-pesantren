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
        Schema::create('karya_santri', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('class')->nullable();
            $table->string('category');
            $table->text('content')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karya_santri');
    }
};
