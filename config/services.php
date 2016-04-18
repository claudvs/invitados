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
        'client_id'     => '1004503009643498',
        'client_secret' => '4b50a7e320a7baa8be00c54ebdad8dc6',
        'redirect'      => 'http://boliche.ticketeg.com.bo/invitados/public/callback',
    ],

];
