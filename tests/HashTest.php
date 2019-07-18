<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

class HashTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$response = $this->call('GET', '/hash', ['Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvbG9naW4iLCJpYXQiOjE1NjM0MzYzODUsImV4cCI6MTU2MzQzOTk4NSwibmJmIjoxNTYzNDM2Mzg1LCJqdGkiOiIySWF6MFpSblI5Y25vQllnIiwic3ViIjoyMCwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.I-tWzjh85TKuaWQkhG2h4XTLsb0WqCwjdTUciGHhMEU']);

        $response = $this->call('GET', '/hash');

        //$this->assertEquals(200, $response->status());
        $this->assertEquals(401, $response->status());
    }
}
