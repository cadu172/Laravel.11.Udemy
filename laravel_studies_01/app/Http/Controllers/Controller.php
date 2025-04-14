<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function cleanUpperCaseString($value): string
    {
        return strtoupper(trim($value));
    }
}
