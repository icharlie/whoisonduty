<?php

use Carbon\Carbon;
use Mockery as m;

class PeriodTest extends TestCase
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

    public function testPeriodCreation()
    {
        $period = new App\Period;
        $period->start = Carbon::now();
        $period->end = Carbon::tomorrow();
        $this->assertTrue($period->save());
    }

    public function testCreatePeriodWithUser()
    {
        $faker = Faker\Factory::create();
        $user = new App\User;
        $user->name = $faker->name;
        $user->email = $faker->email;
        $user->save();

        $period = new App\Period;
        $period->start = Carbon::now();
        $period->end = Carbon::tomorrow();
        $period->user_id = $user->id;
        $this->assertTrue($period->save());
    }

    public function testCreatePeriodWithTopic()
    {
        $faker = Faker\Factory::create();
        $topic = new App\Topic;
        $topic->name = $faker->word;
        $topic->save();

        $period = new App\Period;
        $period->start = Carbon::now();
        $period->end = Carbon::tomorrow();
        $period->topic_id = $topic->id;
        $this->assertTrue($period->save());
    }

}
