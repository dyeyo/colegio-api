<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\User;

class SchoolUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schoolIds = School::pluck('id');
        $userIds = User::pluck('id');

        foreach ($userIds as $userId) {
            DB::table('school_user')->insert([
                'school_id' => $schoolIds->random(),
                'user_id' => $userId,
            ]);
        }
    }
}
