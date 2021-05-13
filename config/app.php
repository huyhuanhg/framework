<?php

return [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddlware' => [
        'san-pham' => Authenticate::class,
        'dashboard' => Authenticate::class
    ],
    'globalMiddleware' => [
        ParamsMiddleware::class
    ]
];