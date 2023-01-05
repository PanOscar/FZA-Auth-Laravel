<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->post('user/register', 'UserController@registerUser');
$router->post('user/login/{identifier}', 'UserController@login');

$router->put('user/update/{identifier}', 'UserController@updateUser');
$router->put("user/reset", 'PasswordResetController@reset');

$router->delete('user/{identifier}', 'UserController@deleteUser');

$router->get('user', 'UserController@index');
$router->get('user/{identifier}', 'UserController@getUser');
$router->get('user/forgot/{email}', 'PasswordResetController@forgot');

