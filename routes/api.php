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
    $api->any('logout', 'App\Api\V1\Controllers\AuthController@logout');

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
    $api->post('activities/{activity}/request','App\Api\V1\Controllers\ActivityRequestController@request');
    $api->post('activity-requests/{request}/accept','App\Api\V1\Controllers\ActivityRequestController@accept');
    $api->post('activity-requests/{request}/reject','App\Api\V1\Controllers\ActivityRequestController@reject');

    // Education Related
    $api->resource('educations', 'App\Api\V1\Controllers\EducationController', ['only' => ['index', 'update', 'store', 'destroy']]);

    // Experience Related
    $api->resource('experiences', 'App\Api\V1\Controllers\ExperienceController', ['only' => ['index', 'update', 'store', 'destroy']]);

    $api->post('me/change-password','App\Api\V1\Controllers\UserController@changePassword');

    // Messaging Related
    $api->post('messages', 'App\Api\V1\Controllers\MessagingController@store');
});