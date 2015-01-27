<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Period;
use Carbon\Carbon;

/**
 * Class PeriodTableSeeder
 * @author Charlie Chang
 */
class PeriodTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $user_id = $faker->numberBetween($min = 0, $max = 10);
        if ($user_id == 0) $user_id = null;

        for ($i = 0; $i < 10; $i++) {
            $start = $this->randomStart();
            Period::create([
                "start" =>  $start,
                "end" => $start->addDay(
                    $faker->numberBetween($min = 7, $max = 30)),
                "user_id" => $user_id
            ]);
        }

    }


    private function randomStart()
    {
        $faker = Faker\Factory::create();
        $today = Carbon::today();
        $next = $today->addDay($faker->randomDigit);
        return $next;
    }
}

