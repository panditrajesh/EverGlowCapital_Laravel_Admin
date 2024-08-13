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
        Schema::create('benefit_section', function (Blueprint $table) {
            $table->id('benefit_id');
            $table->string('benefit_heading', 255);
            $table->string('benefit_image', 255);
            $table->string('benefit_name', 255);
            $table->string('benefit_desc', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefit_section');
    }
};
