<?php

// database/seeders/DatabaseSeeder.php

use App\Models\Institution;
use App\Models\School;
use App\Models\User;
use Database\Seeders\InstitutionsTableSeeder;
use Database\Seeders\SchoolsTableSeeder;
use Database\Seeders\SchoolUserTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            InstitutionsTableSeeder::class,
            SchoolsTableSeeder::class,
            SchoolUserTableSeeder::class,
        ]);
    }
}
