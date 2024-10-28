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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('otp')->nullable();
            $table->dateTime('otp_expiry')->nullable();
            $table->string('work_status')->nullable();
            $table->string('resume')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('desc')->nullable();
            $table->string('twitter_profile_link')->nullable();
            $table->string('instagram_profile_link')->nullable();
            $table->string('linkedin_profile_link')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('role')->nullable();
            $table->longText('skills')->nullable();
            $table->integer('activate_plan_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('company_size')->nullable();
            $table->string('established')->nullable();
            $table->longText('company_service')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
