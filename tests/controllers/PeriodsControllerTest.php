<?php

use Mockery as m;
use Carbon\Carbon;

class PeriodsControllerTest extends TestCase
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
            'user_id' => $this->faker->randomDigit
        ]);

        $this->assertRedirectedToRoute('periods.index');

    }

    public function testEditAPeriod()
    {
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
		];
		$this->call('PUT', '/periods/update', $attributes);
		$this->assertRedirectedToRoute('periods.index');
	}
}
