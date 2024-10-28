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
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('plan_name');
            $table->integer('price_monthly');
            $table->integer('price_annualy');
            $table->integer('duration_in_month');
            $table->integer('duration_in_years');
            $table->string('no_of_jobs_standred_yes_no');
            $table->integer('number_of_jobs_standard');
            $table->string('comopany_carrer_page');
            $table->string('job_post_or_live');
            $table->integer('job_post_or_live_no_of_days');

            $table->string('job_alert_potential_clients');
            $table->string('distributed_google_jobs_network');
            $table->string('featured_job_posts');
            $table->string('social_media_sharing');
            $table->string('company_logo_on_home_page');
            $table->string('resume_database_access');
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
