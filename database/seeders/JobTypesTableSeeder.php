<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_types')->delete();
        
        \DB::table('job_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Full Time',
                'created_at' => '2024-07-14 16:00:43',
                'updated_at' => '2024-07-14 16:00:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Part Time',
                'created_at' => '2024-07-14 16:00:49',
                'updated_at' => '2024-07-14 16:00:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Freelance',
                'created_at' => '2024-07-14 16:00:56',
                'updated_at' => '2024-07-14 16:00:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'intern',
                'created_at' => '2024-07-14 16:01:04',
                'updated_at' => '2024-07-14 16:01:04',
            ),
        ));
        
        
    }
}