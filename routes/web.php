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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{
    $router->get('appointments','AppointmentController@index');
    $router->post('appointments','AppointmentController@store');
    $router->get('appointments/{appointment}','AppointmentController@show');
    $router->put('appointments/{appointment}','AppointmentController@update');
    $router->patch('appointments/{appointment}','AppointmentController@update');
    $router->delete('appointments/{appointment}','AppointmentController@destroy');
});
