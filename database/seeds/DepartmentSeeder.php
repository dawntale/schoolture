<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'code' => 'SHS',
                'name' => 'Senior High School',
                'status' => 1
            ],[
                'code' => 'JHS',
                'name' => 'Junior High School',
                'status' => 1
            ],[
                'code' => 'ELE',
                'name' => 'Elementary School',
                'status' => 1
            ]
        ]);
    }
}
