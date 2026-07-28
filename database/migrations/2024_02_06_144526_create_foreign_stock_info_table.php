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
            $table->foreignId('stock_id')->unique()->constrained('foreign_stocks')->cascadeOnDelete();

            $table->string('ticker')->unique()->nullable();
            $table->decimal('price', 20, 6)->nullable();
            $table->decimal('volatility', 20, 6)->nullable();
            $table->unsignedBigInteger('capitalization')->nullable();
            $table->decimal('last_dividends', 20, 6)->nullable();
            $table->decimal('changes', 20, 6)->nullable();
            $table->string('company_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('exchange')->nullable();
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('ceo')->nullable();
            $table->string('sector')->nullable();
            $table->string('country')->nullable();
            $table->unsignedInteger('employees')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->decimal('dcf_price', 20, 6)->nullable();
            $table->decimal('dcf_price_difference', 20, 6)->nullable();
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
