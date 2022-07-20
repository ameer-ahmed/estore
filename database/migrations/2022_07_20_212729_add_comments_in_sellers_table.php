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
        Schema::table('sellers', function (Blueprint $table) {
            $table->integer('type')->comment('1 = Company, 2 = Person')->change();
            $table->bigInteger('no')->comment('For companies = Commercial Registration No, For persons = National ID')->change();
            $table->integer('account_status')->comment('0 = Closed account, 1 = Normal account, 2 = Under review account, 3 = Banned account for some time, 4 = Permanently suspended account')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->integer('type')->comment('')->change();
            $table->bigInteger('no')->comment('')->change();
            $table->integer('account_status')->comment('')->change();
        });
    }
};
