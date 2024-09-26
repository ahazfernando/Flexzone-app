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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cus_name')->nullable();
            $table->string('cus_email')->nullable();
            $table->string('cus_phone')->nullable();
            $table->string('cus_address')->nullable();
            $table->string('pro_name')->nullable();
            $table->string('pro_price')->nullable();
            $table->string('pro_image')->nullable();

            $table->string('customer_id')->nullable();
            $table->string('product_id')->nullable();

            $table->string('payment_status')->nullable();
            $table->string('package_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
