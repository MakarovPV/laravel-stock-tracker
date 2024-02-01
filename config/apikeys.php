<?php

return [
    'stock' => [
        'foreign' => [
            'alphavantage' => [
                'site_url' => 'https://www.alphavantage.co/',
                'api_key' => 'GQ12XD7I4I34URYY',
                'requests_limit' => 25,
                'limit_interval' => 'day'
            ],

            'finage' => [
                'site_url' => 'https://api.finage.co.uk/',
                'api_key' => 'API_KEY37AAADLPB644GJYMQNP5SXY5OX3118PG',
                'requests_limit' => 1000,
                'limit_interval' => 'month'
            ],

            'financialmodelingprep' => [
                'site_url' => 'https://financialmodelingprep.com/',
                'api_key' => 'APQn16F494zqV6cL42eM7DfLGLiOSIRJ',
                'requests_limit' => 250,
                'limit_interval' => 'day'
            ],
        ],
        'moscow' => [
            'imoex' => [
                'site_url' => 'https://iss.moex.com/',
                'api_key' => '',
                'requests_limit' => 0,
                'limit_interval' => ''
            ]
        ]
    ],

    'crypt' => [
        'crypt' => [
            'cryptocompare' => [
                'site_url' => 'https://min-api.cryptocompare.com/',
                'api_key' => 'f6ca7acf2e964b1d2eb7df1b52ec3d8c5983fea467965d7d7d60313f4b5c5f98',
                'requests_limit' => 100000,
                'limit_interval' => 'month'
            ],
        ]
    ]

];
