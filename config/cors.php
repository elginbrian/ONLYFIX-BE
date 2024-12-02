<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | Here you can configure your CORS settings for your application. You can
    | control which origins, methods, and headers are allowed by your API.
    |
    */

    'paths' => ['*', 'sanctum/csrf-cookie'],  // You can add specific routes like 'api/*' or others

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Define which origins are allowed to make requests to this application.
    | You can specify the frontend URL(s) or use a wildcard for all origins.
    |
    */
    'allowed_origins' => [
        'http://localhost:3000', 
        'http://localhost:3001',
        'http://localhost:3002',
        'https://onlyfix.vercel.app/'
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | Define which HTTP methods are allowed for cross-origin requests.
    | You can set this to '*' to allow all methods, or specify specific ones.
    |
    */
    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Define which headers are allowed when making a cross-origin request.
    | You can set this to '*' to allow all headers, or specify a list of headers.
    |
    */
    'allowed_headers' => ['*'], // Allow all headers

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Define which headers are exposed to the browser in the response.
    | These headers can be accessed by JavaScript running on the frontend.
    |
    */
    'exposed_headers' => [], // Leave empty if you don't need to expose specific headers

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | Specify how long (in seconds) the response to the pre-flight request can be cached by the browser.
    |
    */
    'max_age' => 0, // Set to 0 to not cache the pre-flight request

    /*
    |--------------------------------------------------------------------------
    | Allow Credentials
    |--------------------------------------------------------------------------
    |
    | This option indicates whether or not cookies and authentication headers
    | should be included in cross-origin requests.
    |
    */
    'supports_credentials' => false, // Set to true if you need to support cookies or authentication headers

];
