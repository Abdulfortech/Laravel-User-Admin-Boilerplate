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
        //
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('vendorID');
            $table->integer('adminID')->nullable();
            $table->string('paymentStatus')->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('delivery', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('deliveryType')->nullable();
            $table->string('deliveredBy')->nullable();
            $table->string('deliveredAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
