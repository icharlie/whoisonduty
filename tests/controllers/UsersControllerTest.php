<?php

use Mockery as m;

class UsersControllerTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testGetUsers()
    {
        $user = m::mock('Model', 'App\User');
        $this->app->instance('App\User', $user);
        $user->shouldReceive('all')->once()->andReturn([]);
        $response = $this->call('GET', 'users');
        $this->assertResponseOk();

    }

    public function testCreateUser()
    {
        $response = $this->call('GET', '/users/create');
        $this->assertResponseOk();
    }

    public function testStoreUser()
    {
        $this->response = $this->call('GET', '/users/create');
        $faker = Faker\Factory::create();
        $user = m::mock('Model', 'App\User');
        $this->app->instance('App\User', $user);
        $user->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $request = [
           'name' => $faker->name,
           'email' => $faker->email
        ];

        $this->response = $this->call('POST', 'users', $request);
        $this->assertRedirectedToRoute('users.index');
    }

    public function testVerifyStoreUser()
    {
        $this->call('GET', '/users/create');

        $faker = Faker\Factory::create();
        $request = [
            'email' => $faker->email
        ];

        $response = $this->call('POST', 'users', $request);
        $this->assertRedirectedToRoute('users.create');
    }
}

