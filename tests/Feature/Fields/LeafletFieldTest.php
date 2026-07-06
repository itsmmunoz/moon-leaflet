<?php

use MaycolMunoz\MoonLeaflet\Fields\LeafletField;

it('can be instantiated', function () {
    $field = LeafletField::make('Location');
    expect($field)->toBeInstanceOf(LeafletField::class);
});

it('sets initial position', function () {
    $field = LeafletField::make('Location')
        ->initialPosition(latitude: 40.7580, longitude: -73.9855);

    expect($field->getInitialLatitude())->toBe(40.7580);
    expect($field->getInitialLongitude())->toBe(-73.9855);
});

it('sets columns', function () {
    $field = LeafletField::make('Location')
        ->columns('lat', 'lng');

    expect($field->getLatitudeField())->toBe('lat');
    expect($field->getLongitudeField())->toBe('lng');
});

it('sets draggable', function () {
    $field = LeafletField::make('Location')->draggable(true);
    expect($field->isDraggable())->toBeTrue();

    $field = LeafletField::make('Location')->draggable(false);
    expect($field->isDraggable())->toBeFalse();
});

it('sets layer', function () {
    $field = LeafletField::make('Location')->layer('OpenTopoMap');
    expect($field->getLayer())->toContain('tile.opentopomap.org');
});

it('sets zoom', function () {
    $field = LeafletField::make('Location')->zoom(10);
    expect($field->getZoom())->toBe(10);
});

it('sets min and max zoom', function () {
    $field = LeafletField::make('Location')
        ->minZoom(3)
        ->maxZoom(15);

    expect($field->getMinZoom())->toBe(3);
    expect($field->getMaxZoom())->toBe(15);
});

it('uses the correct view', function () {
    $field = LeafletField::make('Location');
    expect($field->getView())->toBe('moon-leaflet::leaflet-field');
});

it('throws exception for invalid layer', function () {
    LeafletField::make('Location')->layer('InvalidLayer');
})->throws(InvalidArgumentException::class);

it('throws exception for invalid zoom', function () {
    LeafletField::make('Location')->zoom(25);
})->throws(InvalidArgumentException::class);

it('throws exception for invalid min zoom', function () {
    LeafletField::make('Location')->minZoom(0);
})->throws(InvalidArgumentException::class);

it('throws exception for invalid max zoom', function () {
    LeafletField::make('Location')->maxZoom(25);
})->throws(InvalidArgumentException::class);
