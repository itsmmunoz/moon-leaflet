<?php

use MaycolMunoz\MoonLeaflet\Providers\MoonLeafletServiceProvider;

it('registers the service provider', function () {
    $provider = new MoonLeafletServiceProvider(app());
    expect($provider)->toBeInstanceOf(MoonLeafletServiceProvider::class);
});

it('loads package views', function () {
    $view = $this->app['view']->exists('moon-leaflet::leaflet-field');
    expect($view)->toBeTrue();
});
