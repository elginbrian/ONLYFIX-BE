<?php
return [
    'supports_credentials' => true,
    'allowed_origins' => ['http://localhost:3000'],  
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization', 'Accept'],
    'allowed_methods' => ['*'],  
    'exposed_headers' => [],
    'max_age' => 0,
];

