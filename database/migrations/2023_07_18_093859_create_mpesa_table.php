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
        Schema::create('mpesa', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_request_id');
            $table->string('checkout_request_id');
            $table->string('response_code');
            $table->string('response_description')->nullable();
            $table->string('customer_message')->nullable();
            $table->string('request_id')->nullable();
            $table->string('error_code')->nullable();
            $table->string('error_message')->nullable();
            $table->string('amount')->nullable();
            $table->string('mpesa_receipt_number')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa');
    }
};
