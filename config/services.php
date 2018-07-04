<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '765247129763-s5i6ds42nes0loe53nt0rgsecrpanlmh.apps.googleusercontent.com',         // Your google Client ID
        'client_secret' => '07rJcR9rSQN-P42m7MqePsJ_', // Your google Client Secret
        'redirect' => 'http://helpme.com.np/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '206746959940681',         // Your facebook Client ID
        'client_secret' => '9cf20ea92ea4a943d924f3e51c5489d9', // Your facebook Client Secret
        'redirect' => 'http://helpme.com.np/login/facebook/callback',
    ],
];
