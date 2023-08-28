<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CharacterController;


Route::get('/', [CharacterController::class, 'showHomeWithCharacters']);


Route::group(['prefix' => 'Character','controller' => CharacterController::class], function () {
    Route::get('/', 'showAllCharacters')->name('characters');
    Route::get('/CreateCharacter', 'showCreateCharacter')->name('character.create');
    Route::post('/CreateCharacter', 'createCharacter')->name('character.create.post');
    Route::get('/EditCharacter/{character}', 'showEditCharacter')->name('character.edit');
    Route::put('/EditCharacter/{character}', 'updateCharacter')->name('character.edit.put');
    Route::delete('/DeleteCharacter/{character}', 'deleteCharacter')->name('character.delete');
});


Route::group(['prefix' => 'Location','controller' => LocationController::class], function () {
    Route::get('/', 'showAllLocations')->name('locations');
    Route::get('/CreateLocation', 'showCreateLocation')->name('location.create');
    Route::post('/CreateLocation', 'createLocation')->name('location.create.post');
    Route::get('/EditLocation/{location}', 'showEditLocation')->name('location.edit');
    Route::put('/EditLocation/{location}', 'updateLocation')->name('location.edit.put');
    Route::delete('/DeleteLocation/{location}', 'deleteLocation')->name('location.delete');
});


