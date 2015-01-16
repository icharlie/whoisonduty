<?php

use Mockery as m;

class UsersControllerTest extends TestCase
{
    protected $faker;
    public function setUp()
    {
        $this->faker = Faker\Factory::create();
        parent::setUp();
    }
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
        $user = m::mock('Model', 'App\User');
        $this->app->instance('App\User', $user);
        $user->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $request = [
           'name' => $this->faker->name,
           'email' => $this->faker->email
        ];

        $this->response = $this->call('POST', 'users', $request);
        $this->assertRedirectedToRoute('users.index');
    }

    public function testVerifyStoreUser()
    {
        $this->call('GET', '/users/create');

        $request = [
            'email' => $this->faker->email
        ];

        $response = $this->call('POST', 'users', $request);
        $this->assertRedirectedToRoute('users.create');
    }

    public function testEditUser()
    {
        $user = $this->prepareEditUser();
        $response = $this->call('GET', '/users/'. $user->id . '/edit');

        $view = $response->original;

        $this->assertResponseOk();
        $this->assertNotNull($view);
    }


    public function testUpdateUser()
    {
        $this->call('PATCH', '/users/update', ['name' => $this->faker->name, 'email' => $this->faker->email]);
        $this->assertRedirectedToRoute('users.index');
    }

    public function testVerifyUpdateUser()
    {
        $user = $this->prepareEditUser();
        $email = $this->faker->email;

        $this->call('GET', '/users/' . $user->id . '/edit');
        $this->call('PATCH', '/users/update', ['email' => $email]);

        $this->assertRedirectedToRoute('users.edit', $user->id);
    }



    private function prepareEditUser()
    {
        $user = m::mock('StdClass');
        $user->id = $this->faker->randomDigit;
        $user->name = $this->faker->name;
        $user->email = $this->faker->email;

        $mock = m::mock('Model', 'App\User');
        $this->app->instance('App\User', $mock);

        $mock->shouldReceive('whereId')->once()->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn($user);
        return $user;
    }

}

