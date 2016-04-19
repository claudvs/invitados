<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('AKIAIVEQLTE7I5T4HPAQ'),
        'secret' => env('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'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => invitados\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
          'client_id'     => '267476146918327',
         'client_secret' => 'f60752783b23a2e299efbf0c341aa820',
         'redirect'      => 'http://localhost:8080/invitados/public/callback'
    ],

];
