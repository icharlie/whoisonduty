<?php

use Mockery as m;

class TopicsControllerTest extends TestCase
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

    public function testGetTopics()
    {
        $topic = m::mock('Model', 'App\Topic');
        $this->app->instance('App\Topic', $topic);
        $topic->shouldReceive('all')->once()->andReturn([]);
        $response = $this->call('GET', 'topics');
        $this->assertResponseOk();
    }

    public function testCreateTopic()
    {
        $response = $this->call('GET', '/topics/create');
        $this->assertResponseOk();
    }

    public function testStoreTopic()
    {
        $this->response = $this->call('GET', '/topics/create');
        $topic = m::mock('Model', 'App\Topic');
        $this->app->instance('App\Topic', $topic);
        $topic->shouldReceive('create')
            ->once()
            ->andReturn(true);

        $request = [
            'name' => $this->faker->name,
            '_token'    => Session::token()
        ];

        $this->response = $this->call('POST', 'topics', $request);
        $this->assertRedirectedToRoute('topics.index');
    }

    public function testEditTopic()
    {
        $topic = $this->prepareEditTopic();
        $response = $this->call('GET', '/topics/'. $topic->id . '/edit');

        $view = $response->original;

        $this->assertResponseOk();
        $this->assertNotNull($view);
    }


    public function testUpdateTopic()
    {
        $this->call('PATCH', '/topics/update', [
            'name' => $this->faker->name,
            '_token'    => Session::token()
        ]);
        $this->assertRedirectedToRoute('topics.index');
    }

    public function testDestroyTopic()
    {


        $topic = m::mock('Model', 'App\Topic');
        $this->app->instance('App\Topic', $topic);
        $topic->shouldReceive('destroy')
            ->once()
            ->andReturn(true);

        $this->call('DELETE', '/topics/' . $this->faker->randomDigit, [
            '_token' => Session::token()
        ]);
        $this->assertRedirectedToRoute('topics.index');
    }


    private function prepareEditTopic()
    {

        $topic = $this->generateMockTopic();
        $mock = m::mock('Model', 'App\Topic');
        $this->app->instance('App\Topic', $mock);

        $mock->shouldReceive('whereId')->once()->andReturn($mock);
        $mock->shouldReceive('first')->once()->andReturn($topic);
        return $topic;
    }

    private function generateMockTopic()
    {
        $topic = m::mock('StdClass');
        $topic->id = $this->faker->randomDigit;
        $topic->name = $this->faker->name;
        return $topic;
    }
}
