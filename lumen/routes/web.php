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

//http://localhost:8080/api/external-books?name=:nameOfABook
$router->get('/api/external-books', function () use ($router) {
    return $router->app->version();
});

$router->get('/api/external-books', 'IceController@getByName');

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->post('books', 'IceController@create');
    $router->get('books', 'IceController@read');
});
