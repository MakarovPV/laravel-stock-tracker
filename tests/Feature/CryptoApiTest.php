<?php

namespace Tests\Feature;

use Tests\StockApiTest;

class CryptoApiTest extends StockApiTest
{
    public function setUp() : void
    {
        parent::setUp();
        $this->url = '/api/crypto';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSuccessGetCryptoData()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'histoday',
            'ticker' => 'btc',
            'interval' => 7,
            'limit' => 52,
        ]);

        $response->assertStatus(200);
    }


    public function testFailedGetCryptoDataWithoutSegment()
    {
        $response = $this->testGetStockData($this->url, [

            'ticker' => 'btc',
            'interval' => 7,
            'limit' => 52,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetCryptoDataWithoutTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'histoday',

            'interval' => 7,
            'limit' => 52,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetCryptoDataWithoutInterval()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'histoday',
            'ticker' => 'btc',

            'limit' => 52,
        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetCryptoDataWithoutLimit()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'histoday',
            'ticker' => 'btc',
            'interval' => 7,

        ]);

        $response->assertStatus(500);
    }

    public function testFailedGetCryptoDataIncorrectUrl()
    {
        $response = $this->testGetStockData('/incorrectUrl', [
            'segment' => 'histoday',
            'ticker' => 'btc',
            'interval' => 7,
            'limit' => 52,
        ]);

        $response->assertStatus(404);
    }

    public function testFailedGetCryptoDataIncorrectTicker()
    {
        $response = $this->testGetStockData($this->url, [
            'segment' => 'histoday',
            'ticker' => 'incorrect',
            'interval' => 7,
            'limit' => 52,
        ]);

        $this->assertTrue(empty($response['data']));
    }
}
