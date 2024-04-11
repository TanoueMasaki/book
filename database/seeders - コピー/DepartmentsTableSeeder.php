<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('departments')->insert([
            'dep_id_str' => 'D001',
            'dep_name' => '一般',
            'floor' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('departments')->insert([
            'dep_id_str' => 'D002',
            'dep_name' => 'システム部門',
            'floor' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
