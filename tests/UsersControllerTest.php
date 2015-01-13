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
        $response = $this->call('GET', 'users/create');

        $this->assertResponseOk();
    }

    public function testStoreUser()
    {
        $faker = Faker\Factory::create();

        $user = m::mock('Model', 'App\User');

        $this->app->instance('App\User', $user);

        $user->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $request = Request::create('/users', 'POST', [
           'name' => $faker->name,
           'email' => $faker->email
        ]);


        $response = $this->call('POST', 'users', $request->all());

        $this->assertRedirectedTo('users');
    }
}

