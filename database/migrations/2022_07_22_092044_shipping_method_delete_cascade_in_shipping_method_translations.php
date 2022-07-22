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
        Schema::table('shipping_method_translations', function (Blueprint $table) {
            $table->dropForeign('shipping_method_translations_shipping_method_id_foreign');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipping_method_translations', function (Blueprint $table) {
            $table->dropForeign('shipping_method_translations_shipping_method_id_foreign');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
        });
    }
};
