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
                'code' => '2018SHS12',
                'name' => '12',
                'department_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018SHS11',
                'name' => '11',
                'department_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018SHS10',
                'name' => '10',
                'department_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018JHS09',
                'name' => '9',
                'department_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018JHS08',
                'name' => '8',
                'department_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018JHS07',
                'name' => '7',
                'department_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE06',
                'name' => '6',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE05',
                'name' => '5',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE04',
                'name' => '4',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE03',
                'name' => '3',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE02',
                'name' => '2',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018ELE01',
                'name' => '1',
                'department_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ]
        ]);
    }
}
