<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
        	// Create Class A, B, C in grade 12, Senior High School
            [
                'code' => '2018-SHS12-A',
                'name' => 'A',
                'grade_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS12-B',
                'name' => 'B',
                'grade_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS12-C',
                'name' => 'C',
                'grade_id' => 1,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A, B, C in grade 11, Senior High School
            [
                'code' => '2018-SHS11-A',
                'name' => 'A',
                'grade_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS11-B',
                'name' => 'B',
                'grade_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS11-C',
                'name' => 'C',
                'grade_id' => 2,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A, B, C in grade 10, Senior High School
            [
                'code' => '2018-SHS10-A',
                'name' => 'A',
                'grade_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS10-B',
                'name' => 'B',
                'grade_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS10-C',
                'name' => 'C',
                'grade_id' => 3,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A, B in grade 9, Junior High School
            [
                'code' => '2018-JHS09-A',
                'name' => 'A',
                'grade_id' => 4,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS09-B',
                'name' => 'B',
                'grade_id' => 4,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A, B in grade 8, Junior High School
            [
                'code' => '2018-JHS08-A',
                'name' => 'A',
                'grade_id' => 5,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS08-B',
                'name' => 'B',
                'grade_id' => 5,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A, B in grade 7, Junior High School
            [
                'code' => '2018-JHS07-A',
                'name' => 'A',
                'grade_id' => 6,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],[
                'code' => '2018-SHS07-B',
                'name' => 'B',
                'grade_id' => 6,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 6, Elementary School
            [
                'code' => '2018-ELE06-A',
                'name' => 'A',
                'grade_id' => 7,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 5, Elementary School
            [
                'code' => '2018-ELE05-A',
                'name' => 'A',
                'grade_id' => 8,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 4, Elementary School
            [
                'code' => '2018-ELE04-A',
                'name' => 'A',
                'grade_id' => 9,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 3, Elementary School
            [
                'code' => '2018-ELE03-A',
                'name' => 'A',
                'grade_id' => 10,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 2, Elementary School
            [
                'code' => '2018-ELE02-A',
                'name' => 'A',
                'grade_id' => 11,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
            // Create Class A in grade 1, Elementary School
            [
                'code' => '2018-ELE01-A',
                'name' => 'A',
                'grade_id' => 12,
                'schoolyear_start' => '2018-07-22',
                'schoolyear_end' => '2019-07-22',
                'status' => 1
            ],
        ]);
    }
}
