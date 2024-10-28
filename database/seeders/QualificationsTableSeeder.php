<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('qualifications')->delete();
        
        \DB::table('qualifications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '10 th class',
                'created_at' => '2024-07-14 16:01:53',
                'updated_at' => '2024-07-14 16:01:53',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bachelor degree',
                'created_at' => '2024-07-14 16:02:13',
                'updated_at' => '2024-07-14 16:02:27',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Master',
                'created_at' => '2024-07-14 16:02:21',
                'updated_at' => '2024-07-14 16:02:21',
            ),
        ));
        
        
    }
}