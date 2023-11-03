<?php

return [
    'portfolio-api-domain' => env('PORTFOLIO_API_DOMAIN'),
    'database' => [
        'url' => env('PORTFOLIO_DATABASE_URL'),
        'host' => env('PORTFOLIO_DB_HOST', '127.0.0.1'),
        'port' => env('PORTFOLIO_DB_PORT', '3306'),
        'database' => env('PORTFOLIO_DB_DATABASE', 'forge'),
        'username' => env('PORTFOLIO_DB_USERNAME', 'forge'),
        'password' => env('PORTFOLIO_DB_PASSWORD', ''),
        'unix_socket' => env('PORTFOLIO_DB_SOCKET', ''),
        'MYSQL_ATTR_SSL_CA' => env('MYSQL_ATTR_SSL_CA'),
    ],
];
