<?php

namespace App\Helpers;

use Illuminate\Support\ViewErrorBag;

class Utils
{
    public static function inputClass(ViewErrorBag $errors, string $key)
    {
        $cls = ['form-control'];

        if ($errors->get($key)) {
            $cls[] = 'is-invalid';
        }
        return $cls;
    }
}
