<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
        	// Subject for SHS Department
        	[
        		'code' => 'SHS-MAT',
        		'abbreviation' => 'MAT',
        		'name' => 'Mathematics',
        		'department_id' => 1
        	],[
        		'code' => 'SHS-BIO',
        		'abbreviation' => 'BIO',
        		'name' => 'Biology',
        		'department_id' => 1
        	],[
        		'code' => 'SHS-PHY',
        		'abbreviation' => 'PHY',
        		'name' => 'Physics',
        		'department_id' => 1
        	],[
        		'code' => 'SHS-ENG',
        		'abbreviation' => 'ENG',
        		'name' => 'English Language',
        		'department_id' => 1
        	],
        	// Subject for JHS Department
        	[
        		'code' => 'JHS-MAT',
        		'abbreviation' => 'MAT',
        		'name' => 'Mathematics',
        		'department_id' => 2
        	],[
        		'code' => 'JHS-BIO',
        		'abbreviation' => 'BIO',
        		'name' => 'Biology',
        		'department_id' => 2
        	],[
        		'code' => 'JHS-PHY',
        		'abbreviation' => 'PHY',
        		'name' => 'Physics',
        		'department_id' => 2
        	],[
        		'code' => 'JHS-ENG',
        		'abbreviation' => 'ENG',
        		'name' => 'English Language',
        		'department_id' => 2
        	],
        	// Subject for ELE Department
        	[
        		'code' => 'ELE-MAT',
        		'abbreviation' => 'MAT',
        		'name' => 'Mathematics',
        		'department_id' => 3
        	],[
        		'code' => 'ELE-BIO',
        		'abbreviation' => 'BIO',
        		'name' => 'Biology',
        		'department_id' => 3
        	],[
        		'code' => 'ELE-PHY',
        		'abbreviation' => 'PHY',
        		'name' => 'Physics',
        		'department_id' => 3
        	],[
        		'code' => 'ELE-ENG',
        		'abbreviation' => 'ENG',
        		'name' => 'English Language',
        		'department_id' => 3
        	],
        ]);
    }
}
