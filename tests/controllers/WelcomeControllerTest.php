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
        $period = m::mock('Model', 'App\Period');
        $user = m::mock('Model', 'App\User[name]');
        $topic = m::mock('Mode', 'App\Topic[name]');
        $periodRepo->shouldReceive('getClosestPeriod')->once()->andReturn($period);
        $period->shouldReceive('getAttribute')->andReturn($user);
        $period->shouldReceive('getAttribute')->andReturn($topic);
        $user->shouldReceive('name')->andReturn($faker->word);
        $topic->shouldReceive('name')->andReturn($faker->word);


        $this->call('GET', '/');
        $this->assertResponseOk();
    }

}