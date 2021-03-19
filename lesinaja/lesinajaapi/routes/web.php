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

$router->group( ['prefix'=>'api'], function () use ($router) {
    $router->get('guru',['uses'=>'GuruController@index'] );
    $router->get('guru/{id}',['uses'=>'GuruController@show'] );
    $router->delete('guru/{id}',['uses'=>'GuruController@destroy'] );
    $router->put('guru/{id}',['uses'=>'GuruController@update'] );
    $router->post('guru',['uses'=>'GuruController@create'] );

    $router->get('kota',['uses'=>'KotaController@index'] );
    $router->get('kota/{id}',['uses'=>'KotaController@show'] );
    $router->delete('kota/{id}',['uses'=>'KotaController@destroy'] );
    $router->put('kota/{id}',['uses'=>'KotaController@update'] );
    $router->post('kota',['uses'=>'KotaController@create'] );

    $router->get('order',['uses'=>'OrderController@index'] );
    $router->get('order/{id}',['uses'=>'OrderController@show'] );
    $router->delete('order/{id}',['uses'=>'OrderController@destroy'] );
    $router->put('order/{id}',['uses'=>'OrderController@update'] );
    $router->post('order',['uses'=>'OrderController@create'] );

    $router->get('user',['uses'=>'UserController@index'] );
    $router->get('user/{id}',['uses'=>'UserController@show'] );
    $router->delete('user/{id}',['uses'=>'UserController@destroy'] );
    $router->put('user/{id}',['uses'=>'UserController@update'] );
    $router->post('user',['uses'=>'UserController@create'] );

    $router->get('mailverify/{token}',['uses'=>'MailController@verify'] );
    
    $router->get('test',['uses'=>'ExampleController@index'] );
});