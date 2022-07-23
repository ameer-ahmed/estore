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
        Schema::create('product_option_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_option_id')->unsigned();
            $table->string('locale');

            $table->string('name');
            $table->text('details');
            $table->text('about')->nullable();

            $table->unique(['product_option_id', 'locale']);
            $table->foreign('product_option_id')->references('id')->on('product_options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option_translations');
    }
};
