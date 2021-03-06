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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
			$table->string("gender")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('country')->nullable();
			$table->string('town')->nullable();
			$table->string('phone')->nullable();
			$table->boolean('is_admin')->default(false);
            $table->boolean('is_premium')->default(false);
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
			$table->string('affiliation_code')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
