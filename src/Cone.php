<?php

namespace Erjon\Cone;

use Erjon\Cone\App\Models\Key;

class Cone
{
    public static function check()
    {

        dd(Key::all());
    }
}
