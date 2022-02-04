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
    'phrets' => [
        'navica' => [
            'login-url' => env('NAVICA_URL'),
            'username' => env('NAVICA_USER'),
            'password' => env('NAVICA_PW'),
            'authentication-method' => env('NAVICA_AUTH_METHOD'),
            'rets-version' => env('NAVICA_VERSION')
        ],
        'cwtar' => [
            'login-url' => env('CWTAR_URL'),
            'username' => env('CWTAR_USER'),
            'password' => env('CWTAR_PW'),
            'authentication-method' => env('CWTAR_AUTH_METHOD'),
            'rets-version' => env('CWTAR_VERSION')
        ],
    ],
];