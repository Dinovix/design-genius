<?php

use App\Models\Discount;
use App\Models\Category;
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
            $table->foreignIdFor(Category::class);
            $table->string('name');
            $table->decimal('sale_price');
            $table->boolean('is_rentable')->default(false);
            $table->decimal('rent_price')->default(0.0);
            $table->decimal('weight')->nullable();
            $table->string('available_colors')->nullable();
            $table->string('cart_description');
            $table->string('short_description');
            $table->string('long_description');
            $table->string('features')->default("[]"); // string array of product's features
            $table->double('quantity')->nullable();
            $table->boolean('unlimited')->default(false);
			$table->boolean("customizable")->default(false);
            $table->string('location')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            // $table->comment("List of products");
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
