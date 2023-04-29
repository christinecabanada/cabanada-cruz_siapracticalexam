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
$router->get('/users',['uses' => 'TeacherController@users']); //get all users

$router->get('/getuser/{teacherid}', 'TeacherController@show'); // get user by id

$router->post('/add', 'TeacherController@adduser'); // create new user record

$router->put('/update/{teacherid}', 'TeacherController@updateuser'); // update user record

$router->delete('/delete/{teacherid}', 'TeacherController@deleteuser'); // delete record