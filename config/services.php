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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '693596725554-56htacutafjr60obv6j30dqc23t1m9qj.apps.googleusercontent.com' ,
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/google/callback/'
    ],
    'facebook' => [
        'client_id' => '595524281770775' ,
        'client_secret' => '7a25d56d774dfd7498807d86cd3e2e01',
        'redirect' => 'http://127.0.0.1:8000/facebook/callback',
    ],
    'github' => [
        'client_id' => '74e92da7d470cc1a843f' ,
        'client_secret' => 'fb88cb5725a04ccff649319a40fefafc7a107121',
        'redirect' => 'http://localhost:8000/github/auth/callback',
    ],

];
