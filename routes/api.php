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
    $api->post('me/profile-pic','App\Api\V1\Controllers\UserController@uploadProfilePic');
    $api->get('me/pending-invitations','App\Api\V1\Controllers\UserController@pendingInvitations');
    $api->get('me/sent-invitations','App\Api\V1\Controllers\UserController@sentInvitations');

    // Activity Related
    $api->resource('activities', 'App\Api\V1\Controllers\ActivityController', ['only' => ['index', 'update', 'store', 'delete']]);
    $api->post('activities/{activity}/invite-by-email', 'App\Api\V1\Controllers\ActivityUserController@inviteByEmail');

    $api->post('accept-invitation/{invitation}', 'App\Api\V1\Controllers\InvitationController@accept');
    $api->post('reject-invitation/{invitation}', 'App\Api\V1\Controllers\InvitationController@reject');

                      /*Activity Request*/
    $api->post('activityrequest/{activity}/request','App\Api\V1\Controller\ActivityRequestController@request');
    $api->post('activityrequest/{requestid}/accept','App\Api\V1\Controller\ActivityRequestController@accept');
    $api->post('activityrequest/{requestid}/reject','App\Api\V1\Controller\ActivityRequestController@reject');
});
