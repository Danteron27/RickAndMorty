<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'Characters', 'controller'=> CharacterController::class],function(){
    Route::get('/GetAllCharacters', 'getAllCharacters');
    Route::get('/GetAnCharacter/{character}', 'getAnCharacter')->name('characters.get');
    Route::post('/CreateCharacter', 'createCharacter');
    Route::delete('/DeleteCharacter/{character}', 'deleteCharacter');
    Route::put('/UpdateCharacter/{character}', 'updateCharacter');
});