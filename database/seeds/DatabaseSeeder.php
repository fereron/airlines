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
            'first_name' => 'Rufat',
            'last_name' => 'Kadirov',
            'position' => 'Developer',
            'email' => 'fererone@gmail.com',
            'password' => bcrypt('123123'),
        ])->profile()->create([
            'phone_number' => '+99(450) 211-11-11',
            'address' => 'National Aviation Academy',
            'about' => $faker->realText(200),
        ]);

        User::create([
            'first_name' => 'Soul',
            'last_name' => 'Crash',
            'position' => 'Developer',
            'email' => 'even@mail.com',
            'password' => bcrypt('123123'),
        ]);

        factory(User::class, 150)
            ->create();
    }
}
