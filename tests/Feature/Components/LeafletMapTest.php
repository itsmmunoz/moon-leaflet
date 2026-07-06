<?php

use MaycolMunoz\MoonLeaflet\Components\LeafletMap;

it('can be instantiated', function () {
    $component = LeafletMap::make('Business Locations');
    expect($component)->toBeInstanceOf(LeafletMap::class);
});

it('sets initial position', function () {
    $component = LeafletMap::make('Map')
        ->initialPosition(latitude: 40.7580, longitude: -73.9855);

    expect($component->getInitialLatitude())->toBe(40.7580);
    expect($component->getInitialLongitude())->toBe(-73.9855);
});

it('sets items from array', function () {
    $items = [
        ['name' => 'Location 1', 'latitude' => 40.0, 'longitude' => -74.0],
        ['name' => 'Location 2', 'latitude' => 41.0, 'longitude' => -75.0],
    ];

    $component = LeafletMap::make('Map')->items($items);

    expect($component->getItems())->toBe($items);
});

it('sets items from closure', function () {
    $component = LeafletMap::make('Map')->items(fn () => [
        ['name' => 'Location 1', 'latitude' => 40.0, 'longitude' => -74.0],
    ]);

    expect($component->getItems())->toHaveCount(1);
});

it('throws exception for closure returning non-array', function () {
    $component = LeafletMap::make('Map')->items(fn () => 'invalid');
    $component->getItems();
})->throws(InvalidArgumentException::class);

it('sets layer', function () {
    $component = LeafletMap::make('Map')->layer('CartoDB Dark Matter');
    expect($component->getLayer())->toContain('cartocdn.com/dark_all');
});

it('sets zoom', function () {
    $component = LeafletMap::make('Map')->zoom(8);
    expect($component->getZoom())->toBe(8);
});

it('sets min zoom', function () {
    $component = LeafletMap::make('Map')->minZoom(2);
    expect($component->getMinZoom())->toBe(2);
});

it('sets max zoom', function () {
    $component = LeafletMap::make('Map')->maxZoom(16);
    expect($component->getMaxZoom())->toBe(16);
});

it('uses the correct view', function () {
    $component = LeafletMap::make('Map');
    expect($component->getView())->toBe('moon-leaflet::leaflet-map');
});
