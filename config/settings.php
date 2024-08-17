<?php

return [
    'defaults' => [
        'open-to-opportunities' => [
            'type' => 'bool',
            'value' => false,
        ],
        'show-currently-playing' => [
            'type' => 'bool',
            'value' => true,
        ],
        'currently-working-at' => [
            'type' => 'array',
            'value' => [
                'text' => 'Wonde',
                'primary-color' => '#000000',
                'secondary-color' => '#FFFFFF',
                'url' => 'https://wonde.com',
            ],
        ],
    ],
    'broadcastable' => [
        'open-to-opportunities',
        'show-currently-playing',
        'currently-working-at',
    ],
];
