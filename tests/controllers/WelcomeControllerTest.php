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
        $periodRepo = m::mock('App\Repositories\PeriodEloquentRepository');
        $this->app->instance('App\Repositories\PeriodEloquentRepository', $periodRepo);
        $user = m::mock('Model', 'App\User[name]');
        $periodRepo->shouldReceive('getClosestDutyUser')->once()->andReturn($user);
        $user->shouldReceive('name')->andReturn($faker->name);
        

        $this->call('GET', '/');
        $this->assertResponseOk();
    }

}