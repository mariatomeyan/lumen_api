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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('users', ['uses' => 'UserController@create']);
});

$router->group(['prefix' => 'api', 'middleware' => ['jwt.auth']], function () use ($router) {
    $router->get('students', ['uses' => 'StudentController@showAllStudents']);
    $router->get('students/{id}', ['uses' => 'StudentController@showOneStudent']);
    $router->delete('students/{id}', ['uses' => 'StudentController@delete']);
    $router->put('students/{id}', ['uses' => 'StudentController@update']);
    $router->post('students', ['uses' => 'StudentController@create']);
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('currencies', 'ExchangeController@getALl');
});
