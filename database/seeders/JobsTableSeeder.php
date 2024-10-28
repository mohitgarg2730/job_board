<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jobs')->delete();
        
        \DB::table('jobs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'job_title' => 'PHP developer for scripts',
                'job_description' => 'PHP developer for scriptsPHP developer for scriptsPHP developer for scripts',
                'job_category_id' => 1,
                'job_type_id' => 1,
                'job_level_id' => 6,
                'experience_id' => 1,
                'qualification_id' => 1,
                'gender' => 'Male',
                'min_salary' => 1000,
                'max_salary' => 5000,
                'job_expiry_date' => '2024-07-26',
                'job_fee_type_id' => 1,
                'skills' => '2,',
                'address' => 'Mohali 3b2',
                'country_id' => 1,
                'city_id' => 1,
                'user_id' => 13,
                'zip_code' => NULL,
                'company_logo' => 'company_logo/1721765459_download.png',
                'mark_a_featured' => 0,
                'pin_to_top' => 0,
                'approved_by_admin' => 1,
                'created_at' => '2024-07-23 20:10:59',
                'updated_at' => '2024-07-23 20:10:59',
            ),
            1 => 
            array (
                'id' => 2,
                'job_title' => 'PHP developer for scripts',
                'job_description' => 'PHP developer for scriptsPHP developer for scriptsPHP developer for scripts',
                'job_category_id' => 1,
                'job_type_id' => 1,
                'job_level_id' => 6,
                'experience_id' => 1,
                'qualification_id' => 1,
                'gender' => 'Male',
                'min_salary' => 1000,
                'max_salary' => 5000,
                'job_expiry_date' => '2024-07-26',
                'job_fee_type_id' => 1,
                'skills' => '2,',
                'address' => 'Mohali 3b2',
                'country_id' => 1,
                'city_id' => 1,
                'user_id' => 13,
                'zip_code' => NULL,
                'company_logo' => 'company_logo/1721765563_download.png',
                'mark_a_featured' => 0,
                'pin_to_top' => 0,
                'approved_by_admin' => 1,
                'created_at' => '2024-07-23 20:12:43',
                'updated_at' => '2024-07-23 20:12:43',
            ),
            2 => 
            array (
                'id' => 3,
                'job_title' => 'PHP developer for scripts',
                'job_description' => 'PHP developer for scriptsPHP developer for scriptsPHP developer for scripts',
                'job_category_id' => 1,
                'job_type_id' => 1,
                'job_level_id' => 6,
                'experience_id' => 1,
                'qualification_id' => 1,
                'gender' => 'Male',
                'min_salary' => 1000,
                'max_salary' => 5000,
                'job_expiry_date' => '2024-07-26',
                'job_fee_type_id' => 1,
                'skills' => '2,',
                'address' => 'Mohali 3b2',
                'country_id' => 1,
                'city_id' => 1,
                'user_id' => 13,
                'zip_code' => NULL,
                'company_logo' => 'company_logo/1721765817_download.png',
                'mark_a_featured' => 1,
                'pin_to_top' => 0,
                'approved_by_admin' => 1,
                'created_at' => '2024-07-23 20:16:57',
                'updated_at' => '2024-07-23 20:16:57',
            ),
        ));
        
        
    }
}