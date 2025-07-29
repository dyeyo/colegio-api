<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institution;
use App\Models\User;
use Faker\Factory as Faker;

class InstitutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id');

        foreach (range(1, 5) as $i) {
            Institution::create([
                'name' => $faker->company,
                'rut' => $faker->unique()->numerify('########-#'),
                'region' => $faker->state,
                'comuna' => $faker->city,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'start_date' => $faker->date(),
                'created_by' => $userIds->random(),
            ]);
        }
    }
}
