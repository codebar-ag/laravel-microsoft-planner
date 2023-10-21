<?php

namespace CodebarAg\LaravelMicrosoftPlanner\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodebarAg\LaravelMicrosoftPlanner\LaravelMicrosoftPlanner
 */
class LaravelMicrosoftPlanner extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CodebarAg\LaravelMicrosoftPlanner\LaravelMicrosoftPlanner::class;
    }
}
