<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admintemp',
            'email' => 'admintemp@admintemp.com',
            'role' => 'admin',
            'password' => 'admintemp'
        ]);
        /*
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            $user = User::create([
                'name' => $faker->unique()->userName,
                'email' => $faker->email,
                'password' => '1234'
            ]);
        }*/

    }
}
