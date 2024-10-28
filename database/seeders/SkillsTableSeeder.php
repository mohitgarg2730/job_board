<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('skills')->delete();
        
        \DB::table('skills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'html',
                'created_at' => '2024-07-14 15:58:44',
                'updated_at' => '2024-07-14 15:58:44',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'javascript',
                'created_at' => '2024-07-14 15:58:52',
                'updated_at' => '2024-07-14 15:58:52',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'react',
                'created_at' => '2024-07-14 15:58:58',
                'updated_at' => '2024-07-14 15:58:58',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'php',
                'created_at' => '2024-07-14 15:59:03',
                'updated_at' => '2024-07-14 15:59:03',
            ),
        ));
        
        
    }
}