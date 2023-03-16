<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class StockTest extends TestCase
{
    private $user;

    public function setUp() : void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testSuccessLoadMainPage()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testSuccessCreateNewValue()
    {
        $this->call('post', '/', [
            'stock_name' => 'correctStockName',
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseHas('monitored_stocks', [
            'stock_name' => 'correctStockName',
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueIntegerStockName()
    {
        $this->call('post', '/', [
            'stock_name' => 123,
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => 123,
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueEmptyStockName()
    {
        $this->call('post', '/', [
            'stock_name' => '',
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => '',
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueTooShortStockName()
    {
        $this->call('post', '/', [
            'stock_name' => 'Te',
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => 'te',
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueTooLongStockName()
    {
        $this->call('post', '/', [
            'stock_name' => 'TestTestTestTestTestTestTestTest',
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => 'TestTestTestTestTestTestTestTest',
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueEmptyStockTickerName()
    {
        $this->call('post', '/', [
            'stock_name' => 'correctStockName',
            'stock_ticker' => '',
            'stock_category_id' => 'correctStockExchange'
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => 'correctStockName',
            'stock_ticker_symbol' => '',
            'stock_exchange' => 'correctStockExchange'
        ]);
    }

    public function testFailedCreateNewValueEmptyStockExchange()
    {
        $this->call('post', '/', [
            'stock_name' => 'correctStockName',
            'stock_ticker' => 'correctStockTicker',
            'stock_category_id' => ''
        ]);

        $this->assertDatabaseMissing('monitored_stocks', [
            'stock_name' => 'correctStockName',
            'stock_ticker_symbol' => 'correctStockTicker',
            'stock_exchange' => ''
        ]);
    }
}
