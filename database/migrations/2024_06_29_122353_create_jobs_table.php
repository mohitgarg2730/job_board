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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('job_description');
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('job_type_id');
            $table->unsignedBigInteger('job_level_id');
            $table->unsignedBigInteger('experience_id');
            $table->unsignedBigInteger('qualification_id');
            $table->string('gender');
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->date('job_expiry_date');
            $table->unsignedBigInteger('job_fee_type_id');
            $table->string('skills');
            $table->string('address');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('user_id');
            $table->string('zip_code')->nullable();
            $table->string('company_logo')->nullable();
            $table->boolean('mark_a_featured')->nullable();
            $table->boolean('pin_to_top')->nullable();
            $table->boolean('approved_by_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
