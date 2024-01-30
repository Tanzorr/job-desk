<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobApplication;
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

        for ($i = 1; $i <= 20; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id
            ]);
        }

        $employers = Employer::all();

        for ($i = 1; $i <= 100; $i++) {
            if(isset($employers->last()->id)) {
                $employer_id = $employers->last()->id;
            } else {
                $employer_id = 1;
            }
            Job::factory()->create([
                'employer_id' => $employer_id
            ]);
        }

        foreach ($users as $user) {
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                \App\Models\JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
        // \App\Models\User::factory(10)->create();
    }
}
