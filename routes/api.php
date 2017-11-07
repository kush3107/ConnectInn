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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('authenticate', 'App\Api\V1\Controllers\AuthController@login');
    $api->post('register', 'App\Api\V1\Controllers\UserController@store');
    $api->patch('update','App\Api\V1\Controllers\UserController@update');

});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    //
    $api->get('me','App\Api\V1\Controllers\UserController@show');
});
