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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('name')->default("Design Genius");
            $table->string('contact_1')->default("+237 6 80 65 19 80");
            $table->string('contact_2')->nullable();
            $table->string('po_box')->nullable();
            $table->string('email')->default("info@mydesigngenius.com");
            $table->string('address_1')->default("Yaounde, Cameroon");
            $table->string('address_2')->nullable();
            $table->string('description')->nullable();
            $table->string('facebook')->default("https://www.facebook.com/Design-Genius-266925227331326");
            $table->string('twitter')->nullable();
            $table->string('linkedin')->default("https://www.linkedin.com/company/71091584");
            $table->string('website')->default("https://www.mydesigngenius.com");
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
        Schema::dropIfExists('companies');
    }
};
