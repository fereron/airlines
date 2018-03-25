<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/**@var Router $router */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


$router->post('/register', 'Auth\AuthController@register');
$router->post('/login', 'Auth\AuthController@login');

$router->group(['middleware' => ['jwt.auth']], function (Router $router) {
    $router->get('/user', 'UserController@getUser');

    $router->get('/user', 'UserController@getUser');
    $router->post('/user/update', 'UserController@updateProfile');
    $router->post('/user/upload-image', 'UserController@uploadImage');
    $router->get('/users', 'UserController@search');


    $router->post('/friend/sendRequest', 'FriendshipController@sendFriendship');
    $router->post('/friend/accept', 'FriendshipController@acceptFriendRequest');

    $router->get('/friends', 'FriendshipController@friends');
    $router->get('/friends/requests', 'FriendshipController@getFriendRequests');
});


