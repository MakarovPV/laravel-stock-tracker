<?php

namespace Tests\Feature;

use Tests\StockApiTest;

class ForeignStockApiTest extends StockApiTest
{
    public function setUp() : void
    {
        parent::setUp();
        $this->url = '/api/foreign';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessGetStockData()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'weekly',
            'ticker' => 'aapl',
            'interval' => 60,
        ]);

        $response->assertStatus(200);
    }


    public function testFailedGetStockDataWithoutSegment()
    {
        $response = $this->testGetStockData($this->url, [

            'ticker' => 'aapl',
            'interval' => 60,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataWithoutTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'weekly',

            'interval' => 60,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataWithoutInterval()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'weekly',
            'ticker' => 'aapl',

        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataIncorrectUrl()
    {
        $response = $this->testGetStockData('/incorrectUrl', [
            'segment' => 'weekly',
            'ticker' => 'aapl',
            'interval' => 60,
        ]);

        $response->assertStatus(404);
    }

    public function testFailedGetStockDataIncorrectTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'weekly',
            'ticker' => 'incorrect',
            'interval' => 60,
        ]);

        $this->assertTrue(empty($response['data']));
    }
}
