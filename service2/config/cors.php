<?php 
return [    
   'paths' => ['*'],
   'allowed_methods' => ['POST', 'GET', 'DELETE', 'PUT', '*'],
   'allowed_origins' => ['*'],
   'allowed_origins_patterns' => [],
   'allowed_headers' => ['*'],
   'exposed_headers' => ['Access-Control-Request-Method', 'Access-Control-Request-Headers', '*'],
   'max_age' => 0,
   'supports_credentials' => false,
];