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

        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            $user_id = $faker->randomDigitNotNull;

            if ($user_id == 0) $user_id = null;

            $start = $this->randomStart();
            $end = clone $start;
            $days = $faker->numberBetween(10, 30);
            $end->addDays($days);

            Period::create([
                "start" =>  $start,
                "end" => $end,
                "user_id" => $user_id
            ]);
        }

    }


    private function randomStart()
    {
        $faker = Faker\Factory::create();
        $today = Carbon::today();
        return $today->addDays($faker->randomDigit);
    }
}

