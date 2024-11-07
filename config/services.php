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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'python_api' => [
        'endpoints' => [
            'embed_video' => fn($videoId) => str_replace('{video_id}', $videoId, env('PYTHON_API_EMBEDDING_ENDPOINT')),
            'chat' => fn($namespace) =>  str_replace('{namespace_id}', $namespace, env('PYTHON_API_CHAT_ENDPOINT')),
            'generate_snap' => fn() => env('PYTHON_API_SNAP_GENERATE_ENDPOINT'),
            'generate_exam' => fn() => env('PYTHON_API_EXAM_GENERATE_ENDPOINT'),
        ],
        'key' => env('PYTHON_API_KEY'),
    ]

];
