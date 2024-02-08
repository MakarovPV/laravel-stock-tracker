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
        Schema::create('foreign_news_by_ticker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id');

            $table->string('title')->unique();
            $table->string('description');
            $table->string('url');
            $table->dateTime('date');

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
        Schema::dropIfExists('foreign_news_by_ticker');
    }
};
