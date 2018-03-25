<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::truncate();
        Profile::truncate();

        User::create([
            'first_name' => 'Even',
            'last_name' => 'Soul',
            'position' => $faker->jobTitle,
            'email' => 'a@a.a',
            'password' => bcrypt('123123'),
        ])->profile()->create([
            'phone_number' => $faker->phoneNumber,
            'address' => $faker->address,
            'about' => $faker->text(200),
        ]);

        User::create([
            'first_name' => 'Soul',
            'last_name' => 'Crash',
            'position' => $faker->jobTitle,
            'email' => 'even@mail.com',
            'password' => bcrypt('123123'),
        ]);

        factory(User::class, 300)
            ->create()
            ->profile()->create([
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'about' => $faker->text(200),
            ]);
    }
}
