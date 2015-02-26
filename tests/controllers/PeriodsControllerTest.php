<?php

use Mockery as m;
use App\Period;
use Carbon\Carbon;

class PeriodsControllerTest extends TestCase
{
    protected $faker;

    public function setUp()
    {
        $this->faker = Faker\Factory::create();
        parent::setUp();

        Session::start();
    }

    public function tearDown()
    {
        m::close();
    }

    public function testGetPeriods()
    {

        $period = m::mock('Model', 'App\Period');
        $this->app->instance('App\Period', $period);
        $period->shouldReceive('with')
            ->once()
            ->andReturn($period);

        $period->shouldReceive('get')
            ->once()
            ->andReturn([]);


        $this->call('GET', '/periods');

        $this->assertResponseOk();
        // $this->assertViewHas('periods');
    }


    public function testCreateAPeriod()
    {
        $response = $this->call('GET', '/periods/create');
        $this->assertResponseOk();
        $this->assertViewHas('users');
    }

    public function testStoreAPeriod()
    {
        $period = m::mock('Model', 'App\Period');
        $this->app->instance('App\Period', $period);
        $period->shouldReceive('create')
            ->once()
            ->andReturn(true);


        $this->call('POST', '/periods', [
            'start' => Carbon::now()->toDateString(),
            'end' => Carbon::now()->addWeeks(1)->toDateString(),
            'user_id' => $this->faker->randomDigit,
            '_token'    => Session::token()
        ]);

        $this->assertRedirectedToRoute('periods.index');

    }

    public function testEditAPeriod()
    {
        $period = m::mock('Model', 'App\Period');
        $user = m::mock('Model', 'App\User');
        $mock = m::mock('StdClass');
        $mock->id = $this->faker->randomDigit;

        $this->app->instance('App\Period', $period);
        $this->app->instance('App\User', $user);

        $period->shouldReceive('whereId')->andReturn($period);
        $period->shouldReceive('first')->andReturn($mock);
        $user->shouldReceive('lists')->andReturn([]);


        $response = $this->call('GET', '/periods/' . $this->faker->randomDigit . '/edit' );
        $this->assertResponseOk();
        $view = $response->original;
        $this->assertNotNull($view);
        $this->assertViewHas('users');
        $this->assertViewHas('period');
    }

    public function testUpdateAPeriod()
    {
        $attributes = [
            'start' => Carbon::now()->toDateString(),
            'end' => Carbon::now()->addWeeks(1)->toDateString(),
            '_token'    => Session::token()
        ];
        $this->call('PUT', '/periods/update', $attributes);

        $this->assertRedirectedToRoute('periods.index');
    }

    public function testDestroyPeriod()
    {
        $period = m::mock('Model', 'App\Period');
        $this->app->instance('App\Period', $period);
        $period->shouldReceive('destroy')
            ->once()
            ->andReturn(true);

        $this->call('DELETE', '/periods/' . $this->faker->randomDigit, ['_token' => Session::token()]);
        $this->assertRedirectedToRoute('periods.index');
    }
}
