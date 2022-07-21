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
        Schema::create('shipping_method_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shipping_method_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['shipping_method_id', 'locale']);
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_method_translations');
    }
};
