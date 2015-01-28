<?php


class UserTest extends TestCase
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

    public function testUserCreation()
    {
        $faker = Faker\Factory::create();
        $user = new App\User;
        $user->name = $faker->name;
        $user->email = $faker->email;
        $this->assertTrue($user->save());
    }
}
