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
    return " <center> <h1>*********** Lumen Said Hello *********** </h1> </center>";
});


/*
|--------------------------------------------------------------------------
| App specific routes 
|--------------------------------------------------------------------------
|
| Since we are serving specif operation we'll create a group of the operations (Api)
|
*/
$router->group(['prefix' =>'api'], function () use ($router) {
    $router->get('/', function(){
        return " <center> <h1>*********** Lumen Said Hello *********** </h1> </center>";
    });

    $router->post('/login', 'AuthController@postLogin');
    $router->post('/register', 'AuthController@postRegister');
 
    
});



