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

$router->get('/', function() use ($router) {
	echo "API Version 1";
});
$router->post('/auth/login', 'AuthController@authenticate');
$router->group(['prefix' => 'api', 'middleware' => 'jwt.auth'], function($router) {
	$router->get('/', 		   		'TodoController@index');
	$router->get('/{id}',	   		'TodoController@single');
	$router->post('/create',   		'TodoController@create');
	$router->put('/update/{id}',    'TodoController@update');
	$router->delete('/delete/{id}', 'TodoController@delete');
});
