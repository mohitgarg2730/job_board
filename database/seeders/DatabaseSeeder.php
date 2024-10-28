<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call(UsersTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(CategeoriesTableSeeder::class);
        $this->call(JobTypesTableSeeder::class);
        $this->call(QualificationsTableSeeder::class);
        $this->call(JobLevelsTableSeeder::class);
        $this->call(JobExperincesTableSeeder::class);
        $this->call(JobsTableSeeder::class);
    }
}
