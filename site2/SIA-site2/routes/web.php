<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Register application routes here.
|
*/

$router->get('/hello', function () {
    return "HELLO WORKING";
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/products', 'ProductController@getProducts');
$router->post('/products', 'ProductController@add');
$router->get('/products/{id}', 'ProductController@show');
$router->delete('/products/{id}', 'ProductController@delete');
$router->put('/products/{id}', 'ProductController@update');