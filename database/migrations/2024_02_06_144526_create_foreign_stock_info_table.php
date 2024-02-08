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
        Schema::create('foreign_stock_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');

            $table->string('ticker')->unique();
            $table->integer('price');
            $table->integer('volatility');
            $table->string('capitalization');
            $table->integer('last_dividends');
            $table->integer('changes');
            $table->string('company_name');
            $table->string('currency');
            $table->string('exchange');
            $table->string('industry');
            $table->string('website');
            $table->text('description');
            $table->string('ceo');
            $table->string('sector');
            $table->string('country');
            $table->integer('employees');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->integer('dcf_price');
            $table->integer('dcf_price_difference');

            $table->foreign('stock_id')->references('id')->on('foreign_stocks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_stock_info');
    }
};
