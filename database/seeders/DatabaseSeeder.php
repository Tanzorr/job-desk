<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create([
             'name' => 'Oleksandr',
             'email' => 'alexx1984@ukr.net',
         ]);

        User::factory(300)->create();

        $users = User::all()->shuffle();

        for($i = 1; $i <= 20; $i++) {
           Employer::factory()->create([
               'user_id' => $users->pop()->id
           ]);
        }

        $employers = Employer::all();

        for($i = 1; $i <= 100; $i++) {
            Job::factory()->create([
                'employer_id' => $employers->pop()->id
            ]);
        }

        Job::factory()->count(100)->create();
        // \App\Models\User::factory(10)->create();

    }
}
