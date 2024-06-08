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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('userID');
            $table->dropColumn('vendorID');
            $table->integer('adminID')->nullable();
            $table->string('productCode')->nullable();
            $table->decimal('normal_price', 10, 2);
            $table->string('body')->nullable();
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
