<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api',
    'middleware' => ['api']
], function () {
    Route::apiResource('/hookah_place', 'HookahPlaceController');

    Route::get('/hookah/search', 'HookahController@searchAvailableItems');
    Route::apiResource('/hookah', 'HookahController');

    Route::get('/order/reserved', 'OrderController@getReservedItems');
    Route::apiResource('/order', 'OrderController')->only(['index', 'show', 'store']);
});
