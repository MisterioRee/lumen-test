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




/*
|--------------------------------------------------------------------------
| App specific routes 
|--------------------------------------------------------------------------
|
| Since we are serving specif operation we'll create a group of the operations (Api)
| Prefix to the current group is '/' (root URL) 
*/
$router->group(['prefix' =>'/'], function () use ($router) {

    //Root URL
    $router->get('/', function () {
        return " <center> <h1>*********** Hello Lumen *********** </h1> </center>";
    });

    //Login route 
    $router->post('/login', 'AuthController@postLogin');

    //Register route
    $router->post('/register', 'AuthController@postRegister');
   
    /*
    |--------------------------------------------------------------------------
    | Apply the MiddleWare Authentication  
    |--------------------------------------------------------------------------
    |
    | The following sub-group has applied middleware authentication
    |
    */
    $router->group(['middleware' => 'auth'], function ($router) {
       
        //Get hash route
        $router->get('/hash', 'AuthController@getHash'  );    
    });

});



