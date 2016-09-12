<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Service
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

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'paypal' => [
        'client_id' => 'AcayKu1sVGhDWBszLO-fcopHtrb68DpqshW-uQv9GwHXWcZmxgMUO8XU5Q7WW9TTqbKosnsDkm39FI1G',
        'secret' => 'EPUrkpHokYFa9vOgF2M2GMPM8jv_K3WgdVxkgEBslapYeJ28LAyVa0tSwEfn1OTgGW5gSq-y39v8T4Vw'
    ],

];
