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
        Schema::create('home_page_section', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner')->nullable();
            $table->string('heading_one');
            $table->string('heading_two')->nullable();
            $table->string('left_img')->nullable();
            $table->text('section_2_heading_one')->nullable();
            $table->text('heading_one_section_3')->nullable();
            $table->text('conten_section_2')->nullable();
            $table->text('content1_section_3')->nullable();
            $table->text('content2_section_3')->nullable();
            $table->text('content3_section_3')->nullable();
            //   ================================
            $table->text('job_section_heading')->nullable();
            $table->text('job_section_sub_heading')->nullable();
            $table->text('cat_section_heading')->nullable();
            $table->text('cat_section_sub_heading')->nullable();
            $table->text('city_section_heading')->nullable();
            $table->text('city_section_sub_heading')->nullable();
            $table->text('company_section_heading')->nullable();
            $table->text('company_section_sub_heading')->nullable();
            $table->text('plans_section_heading')->nullable();
            $table->text('plans_section_sub_heading')->nullable();
            $table->text('steps_section_heading')->nullable();
            $table->text('steps_section_sub_heading')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_section');
    }
};
