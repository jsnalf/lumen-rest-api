<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('users', 'UserController@getUsers');
    $router->get('users/{$userId}', 'UserController@getUser');
    $router->post('users', 'UserController@postUser');
    $router->put('users/{$userId}', 'UserController@putUser');
    $router->patch('users/{$userId}', 'UserController@patchUser');
    $router->delete('users/{$userId}', 'UserController@deleteUser');
});
