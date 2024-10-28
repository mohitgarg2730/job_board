<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobExperincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('job_experinces')->delete();
        
        \DB::table('job_experinces')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fresher',
                'created_at' => '2024-07-14 16:04:15',
                'updated_at' => '2024-07-14 16:04:15',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '+1 year',
                'created_at' => '2024-07-14 16:04:20',
                'updated_at' => '2024-07-14 16:04:37',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '+ 2 years',
                'created_at' => '2024-07-14 16:04:29',
                'updated_at' => '2024-07-14 16:04:29',
            ),
        ));
        
        
    }
}