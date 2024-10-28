<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 13,
                'name' => 'Mohit Kumar',
                'email' => 'company@gmail.com',
                'mobile' => '9056236996',
                'email_verified_at' => NULL,
                'password' => '$2y$12$utgLLUm4O9pYhz4dD2Uwk.Y0JYQJhe2MUdOWZuaRntCN3Ggfvcwyi',
                'work_status' => NULL,
                'resume' => NULL,
                'role' => 'company',
                'remember_token' => NULL,
                'created_at' => '2024-06-29 10:38:21',
                'updated_at' => '2024-06-29 10:38:21',
            ),
            1 =>
            array (
                'id' => 14,
                'name' => 'candidate',
                'email' => 'candidate@gmail.com',
                'mobile' => '9056239874',
                'email_verified_at' => NULL,
                'password' => '$2y$12$D1VzbMRyIZnPu7HGwIA5.u.R2YajSIt9MpgJ.1ItSmeRauiNKsxYe',
                'work_status' => 'Employed',
                'resume' => 'resumes/1719657718_dd12-13_0.pdf',
                'role' => 'employee',
                'remember_token' => NULL,
                'created_at' => '2024-06-29 10:41:58',
                'updated_at' => '2024-06-29 10:41:58',
            ),
            2 =>
            array (
                'id' => 11,
                'name' => 'Mohit Kumar',
                'email' => 'admin@gmail.com',
                'mobile' => '9056297565',
                'email_verified_at' => NULL,
                'password' => Hash::make('Admin@123'),
                'work_status' => 'Employed',
                'resume' => 'resumes/1719641907_dd12-13_0.pdf',
                'role' => 'Admin',
                'remember_token' => NULL,
                'created_at' => '2024-06-29 06:18:28',
                'updated_at' => '2024-06-29 06:18:28',
            ),
        ));


    }
}
