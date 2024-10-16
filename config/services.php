<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'spotify' => [
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        'redirect' => env('APP_URL').'/oauth/spotify/callback',
        'min_refresh_after' => env('SPOTIFY_MIN_REFRESH_AFTER', 15000),
        'idle_refresh_after' => env('SPOTIFY_IDLE_REFRESH_AFTER', 60000),
        'token_url' => 'https://accounts.spotify.com/api/token',
        'api_url' => 'https://api.spotify.com/v1/',
    ],

    'laravelpassport' => [
        'enabled' => env('ENABLE_KNOX_LOGIN', false),
        'client_id' => env('KNOX_CLIENT_ID'),
        'client_secret' => env('KNOX_CLIENT_SECRET'),
        'redirect' => env('KNOX_REDIRECT_URI'),
        'host' => env('KNOX_HOST'),
    ],
];
