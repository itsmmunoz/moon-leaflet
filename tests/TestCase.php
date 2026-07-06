<?php

namespace MaycolMunoz\MoonLeaflet\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            \MoonShine\Laravel\Providers\MoonShineServiceProvider::class,
            \MaycolMunoz\MoonLeaflet\Providers\MoonLeafletServiceProvider::class,
        ];
    }
}
