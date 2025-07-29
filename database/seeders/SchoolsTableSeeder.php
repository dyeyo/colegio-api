<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;
use App\Models\Institution;
use Faker\Factory as Faker;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $institutionIds = Institution::pluck('id');

        foreach (range(1, 10) as $i) {
            School::create([
                'name' => $faker->company . ' School',
                'rut' => $faker->unique()->numerify('########-#'),
                'region' => $faker->locale(),
                'comuna' => $faker->locale(),
                'address' => $faker->address,
                'phone' => $faker->unique()->numerify('########-#'),
                'institution_id' => $institutionIds->random(),
            ]);
        }
    }
}
