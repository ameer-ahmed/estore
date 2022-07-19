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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('country');
            $table->string('city');
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->integer('postal_code')->unsigned();
            $table->integer('type')->unsigned();
            $table->bigInteger('no')->unsigned();
            $table->string('image_path')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->integer('account_status')->default(1);
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
        Schema::dropIfExists('sellers');
    }
};
