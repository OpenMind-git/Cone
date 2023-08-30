<?php

return [
    'connection' => env('CONE_DB_CONNECTION', 'mysql'),
    'route-after-license' => 'login',
    'route-to-logout' => 'logout'
];
