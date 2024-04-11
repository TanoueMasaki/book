<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([
            'name' => '大阪 太郎',
            'email' => 'sample@sample.com',
            'password' => 'sample1234',
            'emp_number' => 00001,
            'dep_id_str' => 'D001',
            'dep_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => '梅田 花子',
            'email' => 'sample2@sample.com',
            'password' => 'sample1234',
            'emp_number' => 00002,
            'dep_id_str' => 'D002',
            'dep_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
