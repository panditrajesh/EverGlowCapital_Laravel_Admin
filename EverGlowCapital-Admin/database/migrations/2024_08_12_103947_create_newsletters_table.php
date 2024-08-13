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
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id('newsletter_id');
            $table->string('newsletter_image', 255);
            $table->string('newsletter_price', 255);
            $table->string('newsletter_heading', 255);
            $table->string('newsletter_title', 255);
            $table->string('newsletter_shortdesc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
