# OM-link 3.0 Cone

### How to use

- Installation
```
composer required erjon/cone
```

- Publish files
```
php artisan vendor:publish --tag=cone
```

- Modify config file which is located at ``config/cone.php``.
Below is a prebuild structure.
```
<?php

return [
    'connection' => env('CONE_DB_CONNECTION', 'mysql'),
    'route-after-license' => 'login',
    'route-to-logout' => 'logout'
];

```

1. Structure
   - The most important one is ``connection``. At ``config/database.php`` there are some connections like mysql, pgsql etc. You can create a new one or use those. You need to connect to the Om-link 3.0 Bumblebee database so that the package can work.
   - ``route-after-license`` is the route you wish to get redirected after you provide the correct license key
   - ``route-to-logout`` is the name of the logout route you have.

 

- Add the ``license`` middleware to your desired routes. Preferably at the superadmin or admin routes. You need to have an authenticated user so that the middleware can work.

