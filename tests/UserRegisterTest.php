<?php
 
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_register_user()
    { 
        //Given is user
        $user = array([
            'name' => 'Muhammad',
            'email' => 'example@email.com',
            'password' => 'anyPassword'
        ]);
        
        
        //When they hit the endpoint /register create a new user, while passing necessary data  
        $this->post('/register', $user);
        


        //Then there should be a new record 
        $this->seeInDatabase('users',[
            'name' => 'Muhammad',
            'email' => 'example@email.com',
        ]);
        
    }
}
