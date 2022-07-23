<?php

use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
			$table->unsignedBigInteger('referred_by')->nullable();
			$table->foreign('referred_by')->references('id')->on('users');
            $table->decimal('total_price');
            $table->decimal('total_discount');
            $table->decimal('promo_code');
            $table->string('delivery_address')->nullable();
            $table->string('po_box')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->decimal('tax')->nullable();
            $table->boolean('paid')->default(false);
            $table->boolean('shipped')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
