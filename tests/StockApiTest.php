<?php

namespace Tests;

abstract class StockApiTest extends TestCase
{
    protected $url;
    /**
     * A basic feature test example.
     *
     */
    protected function testGetStockData($url, $parameters)
    {
        return $this->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->call('get', $url, $parameters);
    }
}
