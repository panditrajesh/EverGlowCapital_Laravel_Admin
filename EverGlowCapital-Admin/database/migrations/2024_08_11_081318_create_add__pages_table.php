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
        Schema::create('add__pages', function (Blueprint $table) {
            $table->id('page_id');
            $table->boolean('page_status');
            $table->string('page_name', 255);
            $table->string('featured_image', 255);
            $table->string('banner_image', 255);
            $table->string('page_shortdesc', 255);
            $table->string('page_desc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add__pages');
    }
};
