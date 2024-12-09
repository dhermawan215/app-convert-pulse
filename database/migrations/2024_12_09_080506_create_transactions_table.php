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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->bigInteger('provider_id')->nullable();
            $table->double('rate')->nullable();
            $table->double('pulse_amount')->nullable();
            $table->double('total_pulse')->nullable();
            $table->bigInteger('payment_id')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('account_name')->nullable();
            $table->timestamp('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
