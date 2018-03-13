<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'code' => 'SHS12',
                'name' => '12',
                'department_id' => 1,
                'status' => 1
            ],[
                'code' => 'SHS11',
                'name' => '11',
                'department_id' => 1,
                'status' => 1
            ],[
                'code' => 'SHS10',
                'name' => '10',
                'department_id' => 1,
                'status' => 1
            ],[
                'code' => 'JHS09',
                'name' => '9',
                'department_id' => 2,
                'status' => 1
            ],[
                'code' => 'JHS08',
                'name' => '8',
                'department_id' => 2,
                'status' => 1
            ],[
                'code' => 'JHS07',
                'name' => '7',
                'department_id' => 2,
                'status' => 1
            ],[
                'code' => 'ELE06',
                'name' => '6',
                'department_id' => 3,
                'status' => 1
            ],[
                'code' => 'ELE05',
                'name' => '5',
                'department_id' => 3,
                'status' => 1
            ],[
                'code' => 'ELE04',
                'name' => '4',
                'department_id' => 3,
                'status' => 1
            ],[
                'code' => 'ELE03',
                'name' => '3',
                'department_id' => 3,
                'status' => 1
            ],[
                'code' => 'ELE02',
                'name' => '2',
                'department_id' => 3,
                'status' => 1
            ],[
                'code' => 'ELE01',
                'name' => '1',
                'department_id' => 3,
                'status' => 1
            ]
        ]);
    }
}
