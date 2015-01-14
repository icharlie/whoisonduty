<?php

use Mockery as m;

class WelcomenControllerTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testIndex()
    {

        $faker = Faker\Factory::create();
        $currenctUser = m::mock('StdClass');
        $currenctUser->name = $faker->name;
        $user = m::mock('Model', 'App\User');
        $this->app->instance('App\User', $user);
        $user->shouldReceive('first')->once()->andReturn($currenctUser);

        $this->call('GET', '/');
        $this->assertResponseOk();
    }

}