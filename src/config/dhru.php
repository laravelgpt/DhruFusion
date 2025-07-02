<?php

return [
    'api_key_length' => 32,
    'rate_limit_admin' => '30,1', // 30 requests per minute
    'rate_limit_api' => '60,1',   // 60 requests per minute
    'features' => [
        'blade' => true,
        'livewire' => true,
        'react' => true,
        'vue' => true,
        'inertia' => false, // set to true if you add inertia stubs
        'api_only' => false, // set to true if you add api stubs
    ],
]; 