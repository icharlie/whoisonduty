<?php

/**
* TopicTest
*/
class TopicTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown()
    {
        DB::rollback();
    }

    public function testTopicCreation()
    {
        $faker = Faker\Factory::create();
        $topic = new App\Topic;
        $topic->name = $faker->word;
        $this->assertTrue($topic->save(), 'Save Topic success');
    }

}