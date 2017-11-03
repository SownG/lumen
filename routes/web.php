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

use Laravel\Lumen\Routing\Router;

Route::group(['namespace' => 'Api', 'prefix'=> 'api/v1'], function (Router $router){
    $router->post('/auth/register', "UserController@register");
    $router->post('/auth/login', "UserController@login");
    $router->group(['prefix' => 'users', 'middleware' => 'auth'], function (Router $router){
        $router->get('/', "UserController@getUsers");
    });
});