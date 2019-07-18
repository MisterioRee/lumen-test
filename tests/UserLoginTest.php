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

        $content = json_decode($this->response->getContent());
        $this->assertObjectHasAttribute('token', $content, 'Token does not exists');

        
    }
}
