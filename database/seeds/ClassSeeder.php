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
                'code' => '2018SHS12-A',
                'name' => 'A',
                'grade_id' => 1,
                'status' => 1
            ],[
                'code' => '2018SHS12-B',
                'name' => 'B',
                'grade_id' => 1,
                'status' => 1
            ],[
                'code' => '2018SHS12-C',
                'name' => 'C',
                'grade_id' => 1,
                'status' => 1
            ],
            // Create Class A, B, C in grade 11, Senior High School
            [
                'code' => '2018SHS11-A',
                'name' => 'A',
                'grade_id' => 2,
                'status' => 1
            ],[
                'code' => '2018SHS11-B',
                'name' => 'B',
                'grade_id' => 2,
                'status' => 1
            ],[
                'code' => '2018SHS11-C',
                'name' => 'C',
                'grade_id' => 2,
                'status' => 1
            ],
            // Create Class A, B, C in grade 10, Senior High School
            [
                'code' => '2018SHS10-A',
                'name' => 'A',
                'grade_id' => 3,
                'status' => 1
            ],[
                'code' => '2018SHS10-B',
                'name' => 'B',
                'grade_id' => 3,
                'status' => 1
            ],[
                'code' => '2018SHS10-C',
                'name' => 'C',
                'grade_id' => 3,
                'status' => 1
            ],
            // Create Class A, B in grade 9, Junior High School
            [
                'code' => '2018JHS09-A',
                'name' => 'A',
                'grade_id' => 4,
                'status' => 1
            ],[
                'code' => '2018SHS09-B',
                'name' => 'B',
                'grade_id' => 4,
                'status' => 1
            ],
            // Create Class A, B in grade 8, Junior High School
            [
                'code' => '2018JHS08-A',
                'name' => 'A',
                'grade_id' => 5,
                'status' => 1
            ],[
                'code' => '2018SHS08-B',
                'name' => 'B',
                'grade_id' => 5,
                'status' => 1
            ],
            // Create Class A, B in grade 7, Junior High School
            [
                'code' => '2018JHS07-A',
                'name' => 'A',
                'grade_id' => 6,
                'status' => 1
            ],[
                'code' => '2018SHS07-B',
                'name' => 'B',
                'grade_id' => 6,
                'status' => 1
            ],
            // Create Class A in grade 6, Elementary School
            [
                'code' => '2018ELE06-A',
                'name' => 'A',
                'grade_id' => 7,
                'status' => 1
            ],
            // Create Class A in grade 5, Elementary School
            [
                'code' => '2018ELE05-A',
                'name' => 'A',
                'grade_id' => 8,
                'status' => 1
            ],
            // Create Class A in grade 4, Elementary School
            [
                'code' => '2018ELE04-A',
                'name' => 'A',
                'grade_id' => 9,
                'status' => 1
            ],
            // Create Class A in grade 3, Elementary School
            [
                'code' => '2018ELE03-A',
                'name' => 'A',
                'grade_id' => 10,
                'status' => 1
            ],
            // Create Class A in grade 2, Elementary School
            [
                'code' => '2018ELE02-A',
                'name' => 'A',
                'grade_id' => 11,
                'status' => 1
            ],
            // Create Class A in grade 1, Elementary School
            [
                'code' => '2018ELE01-A',
                'name' => 'A',
                'grade_id' => 12,
                'status' => 1
            ],
        ]);
    }
}
