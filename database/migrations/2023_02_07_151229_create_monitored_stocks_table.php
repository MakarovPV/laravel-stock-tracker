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
        Schema::create('monitored_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default('0');

            $table->string('stock_name');
            $table->string('stock_ticker_symbol')->unique();
            $table->string('stock_exchange');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitored_stocks');
    }
};
