<?php

namespace Tests\Feature;

use Tests\StockApiTest;

class MoscowStockApiTest extends StockApiTest
{
    public function setUp() : void
    {
        parent::setUp();
        $this->url = '/api/moscow';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessGetStockData()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'year',
            'ticker' => 'gazp',
            'interval' => 7,
        ]);

        $response->assertStatus(200);
    }

    public function testFailedGetStockDataWithoutSegment()
    {
        $response = $this->testGetStockData($this->url, [

            'ticker' => 'gazp',
            'interval' => 7,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataWithoutTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'year',

            'interval' => 7,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataWithoutInterval()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'year',
            'ticker' => 'gazp',

        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetStockDataIncorrectUrl()
    {
        $response = $this->testGetStockData('/incorrectUrl', [
            'segment' => 'year',
            'ticker' => 'gazp',
            'interval' => 7,
        ]);

        $response->assertStatus(404);
    }

    public function testFailedGetStockDataIncorrectTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'year',
            'ticker' => 'incorrect',
            'interval' => 7,
        ]);

        $this->assertTrue(empty($response['data']));
    }
}
