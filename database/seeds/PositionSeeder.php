<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_positions')->insert([
        	[
        		'name' => 'Headmaster'
        	],[
        		'name' => 'Teacher'
        	],[
        		'name' => 'Administration'
        	],[
        		'name' => 'Security'
        	]
        ]);
    }
}
