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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('vendorID')->nullable();
            $table->string('subject')->nullable();
            $table->text('body')->nullable();
            $table->string('contact')->nullable();
            $table->string('isRead')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('productID')->nullable();
            $table->integer('vendorID')->nullable();
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
