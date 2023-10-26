<?php

// config for CodebarAg/LaravelMicrosoftPlanner

return [
    'auth' => [
        'client_id' => env('MICROSOFT_PLANNER_CLIENT_ID'),
        'client_secret' => env('MICROSOFT_PLANNER_CLIENT_SECRET'),
        'tenant_id' => env('MICROSOFT_PLANNER_TENANT_ID'),
    ],
];
