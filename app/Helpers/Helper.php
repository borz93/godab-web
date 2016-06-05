<?php

namespace App\Helpers;

use Request;
use Intervention\Image\Facades\Image;
class Helper
{
    public static function set_active($path, $active = 'active')
    {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }

}