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
        'client_id' => '274018894328-kbi3hct4fffojg68d0oo5pvm4auuvvlg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/ecomm/google-callback',
    ],
    'facebook' => [
        'client_id' => 'Facebook app id',
        'client_secret' => 'Facebook add secret',
        'redirect' => 'http://localhost/ecomm/fb-callback',
    ],

];
