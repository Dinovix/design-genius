<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->string('name');
            $table->decimal('price');
            $table->decimal('weigth');
            $table->string('cart_desc');
            $table->string('short_desc');
            $table->string('long_desc');
            $table->string('image');
            $table->double('stock');
            $table->boolean('unlimited');
            $table->string('location')->nullable();
            $table->date('live')->nullable();
            $table->string('thumb')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->comment("List of products");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
