<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_levels')->delete();
        
        \DB::table('job_levels')->insert(array (
            0 => 
            array (
                'id' => 6,
                'name' => 'Manager',
                'created_at' => '2024-07-14 16:03:27',
                'updated_at' => '2024-07-14 16:03:27',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Team Leader',
                'created_at' => '2024-07-14 16:03:18',
                'updated_at' => '2024-07-14 16:03:18',
            ),
        ));
        
        
    }
}