<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'role' => 100,
             'password' => Hash::make('123')
         ]);
        foreach (range(1, 10) as $_) {
            DB::table('restaurants')->insert([
                'name' => $faker->company(),
                'code' => $faker->postcode,
                'address' => $faker->streetAddress()
            ]);
        }
        foreach (range(1, 10) as $_) {
            DB::table('menus')->insert([
                'restaurant_id' => rand(1,10),
                'name' => $faker->userName()
            ]);
        }
        foreach (range(1, 10) as $_) {
            DB::table('dishes')->insert([
                'name' => $faker->domainName(),
                'about' => $faker->realText
            ]);
        }
    }

}
