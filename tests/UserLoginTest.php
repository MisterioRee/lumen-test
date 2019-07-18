<?php
 
use Illuminate\Cache\ArrayStore;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class UserLoginTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_login_user()
    {
       //Given is user
        $this->json('POST', '/login', [
            'password' => '12345',
            'email' => 'hahn.kellie@aufderhar.biz'
        ]);
       //When they hit the endpoint /register create a new user, while passing necessary data  
        $content = json_decode($this->response->getContent());
        
         //Then there should be a new record 
        $this->assertObjectHasAttribute('token', $content, 'Token does not exists');

        
    }
}
