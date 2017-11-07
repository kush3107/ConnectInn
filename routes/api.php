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
});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->post('users/{user}/follow', 'App\Api\V1\Controllers\UserController@follow');
    $api->post('users/{user}/un-follow', 'App\Api\V1\Controllers\UserController@unfollow');
    $api->get('followers', 'App\Api\V1\Controllers\UserController@listFollowers');
    //
});
