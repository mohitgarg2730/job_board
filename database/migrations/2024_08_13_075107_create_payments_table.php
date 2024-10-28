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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('stripe_id');
            $table->string('amount');
            $table->string('currency');
            $table->string('description');
            $table->string('customer_email');
            $table->string('type');
            $table->json('plans_details');
            $table->integer('plan_id');
            $table->date('plan_start_date');
            $table->date('plan_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
