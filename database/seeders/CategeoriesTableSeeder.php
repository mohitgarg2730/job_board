<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategeoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categeories')->delete();
        
        \DB::table('categeories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cat_name' => 'web Application',
                'created_at' => '2024-07-14 15:59:44',
                'updated_at' => '2024-07-14 15:59:44',
            ),
            1 => 
            array (
                'id' => 2,
                'cat_name' => 'Banking Services',
                'created_at' => '2024-07-14 15:59:57',
                'updated_at' => '2024-07-14 15:59:57',
            ),
            2 => 
            array (
                'id' => 3,
                'cat_name' => 'UI/Ux design',
                'created_at' => '2024-07-14 16:00:05',
                'updated_at' => '2024-07-14 16:00:05',
            ),
            3 => 
            array (
                'id' => 4,
                'cat_name' => 'IOS',
                'created_at' => '2024-07-14 16:00:13',
                'updated_at' => '2024-07-14 16:00:13',
            ),
        ));
        
        
    }
}