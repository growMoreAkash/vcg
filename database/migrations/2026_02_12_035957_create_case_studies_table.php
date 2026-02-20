<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique(); // For frontend routing

            $table->string('post_image', 500); // Longer path support
            $table->string('outer_text');
            $table->longText('inner_text'); // Better for long content
            $table->string('pdf_file', 500);

            $table->json('high_lights')->nullable();

            $table->boolean('status')->default(true); // Active / Inactive

            $table->timestamps();
            $table->softDeletes(); // Soft delete support

            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
