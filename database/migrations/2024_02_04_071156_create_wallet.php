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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('nature')->nullable();
            $table->string('slang')->unique();
            $table->string('motto')->nullable();
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('description')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('instgram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('adminID')->nullable();
            $table->integer('title')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('vendorID')->nullable();
            $table->integer('packageID')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('subscriptionID')->nullable();
            $table->integer('packageID')->nullable();
            $table->string('reference')->nullable();
            $table->string('gateway')->nullable();
            $table->string('channel')->nullable();
            $table->float('amount')->nullable();
            $table->float('fees')->nullable();
            $table->float('discount')->nullable();
            $table->float('total')->nullable();
            $table->string('status')->nullable();
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
