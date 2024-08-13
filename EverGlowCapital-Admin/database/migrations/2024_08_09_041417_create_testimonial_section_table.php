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
        Schema::create('testimonial_section', function (Blueprint $table) {
            $table->id('testimonial_id');
            $table->string('testimonial_section_heading', 255);
            $table->string('testimonial_image', 255);
            $table->string('testimonial_heading', 255);
            $table->string('testimonial_shortdesc', 255);
            $table->string('testimonial_author', 255);
            $table->string('testimonial_author_position', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_section');
    }
};
