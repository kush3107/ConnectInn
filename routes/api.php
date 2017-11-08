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
    $api->get('me','App\Api\V1\Controllers\UserController@show');
    $api->patch('me','App\Api\V1\Controllers\UserController@update');

    // Activity Related
    $api->resource('activities', 'App\Api\V1\Controllers\ActivityController', ['only' => ['index', 'update', 'store', 'delete']]);
    $api->post('activities/{activity}/invite-by-email', 'App\Api\V1\Controllers\ActivityController@inviteByEmail');

    $api->post('accept-invitation/{invitation}', 'App\Api\V1\Controllers\InvitationController@accept');
});
