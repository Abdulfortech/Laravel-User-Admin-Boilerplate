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
        
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('vendorID')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('market')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('userID')->nullable();
            $table->integer('productID')->nullable();
            $table->integer('vendorID')->nullable();
            $table->string('type')->nullable();
            $table->text('body')->nullable();
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
