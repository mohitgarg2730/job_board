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
        Schema::create('setting_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('li_link')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('in_link')->nullable();
            $table->string('fb_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_models');
    }
};