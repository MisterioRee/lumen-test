<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use ProfessorHash\ProfessorHash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    /**
     * @var \Tymon\JWTAuth\JWTAuth
     */
    protected $jwt;


    /*
    |--------------------------------------------------------------------------
    | Custom Payload  
    |--------------------------------------------------------------------------
    |
    | We can create custom payload and apply to jwt
    | But i am happy to go with default payload right now
    | 😊
    */
    public function __construct(JWTAuth $jwt)
    { 
        // $payload = [
        // 'iat' => time(), // Time when JWT was issued. 
        // 'exp' => time() + 60*60 // Expiration time
        //  ];
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        //$jwt->payload = $payload;
        
        $this->jwt = $jwt;
    }

    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \Http\Request   $request 
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        //Validate the post array
        $validatedRequest = $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);
        
        
        try {
            //check the user credential and generate tocken
            $token = $this->jwt->attempt($validatedRequest);
            //If token is not generate
            if (!$token ) 
                //Retun with error 404
                return response()
                ->json(
                        ['user_not_found'], 
                        404,
                      );

        } catch (Exception $e) {

           return response()
           ->json(
               ['error' => $e->getMessage()], 
               500);
        }

        //return generated token
        return response()->json(compact('token'));
    }

     /**
     * Register User and returen it, if the post array is validated
     * 
     * @param  \Http\Request   $request 
     * @param  \App\User       $user 
     * @return mixed
     */
    public function postRegister(Request $request, User $user)
    {
         //Validate the post array
        $validatedUser = $this->validate(
            $request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:255|min:6'

        ]);
        
        //If array is validated create user return created user, Hence password is hidden
        return $user->createUser(   $validatedUser );
    }


    /**
     * Register User and returen it, if the post array is validated
     * 
     * @return hashString
     */
    public function getHash()
    {   
        //ProfessorHash Class object
        $hashObj = new  ProfessorHash;
        //Generate Random Hash
        $hash = $hashObj->makeHash(10);  
        //Log info to monolog  
        Log::info('Random Hash:'. $hash);
        //return hash string
        return response()->json(compact('hash'));
    }
}