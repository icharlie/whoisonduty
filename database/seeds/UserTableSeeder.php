 <?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Class UserTableSeeder
 * @author Charlie Chang
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        $faker = Faker\Factory::create();


        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email
            ]);
        }
    }
}