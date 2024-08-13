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
        Schema::create('blog_section', function (Blueprint $table) {
            $table->id('blog_id');
            $table->string('blog_para', 255);
            $table->string('blog_section_heading', 255);
            $table->string('blog_image', 255);
            $table->string('blog_category', 255);
            $table->string('blog_heading', 255);
            $table->string('blog_shortdesc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_section');
    }
};
