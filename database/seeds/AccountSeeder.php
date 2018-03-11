<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator acc
        DB::table('administrators')->insert([
            'name' => 'Schoolture',
            'email' => 'admin@schoolture.dev',
            'password' => Hash::make('password')
        ]);

        // Student acc
        DB::table('students')->insert([
            'student_id' => '12345678',
            'first_name' => 'Karen',
            'last_name' => 'Raynor',
            'email' => 'students@schoolture.dev',
            'password' => Hash::make('students'),
            'birthdate' => '2001-04-23',
            'sex' => 'Female',
            'grade_id' => 1, // SHS
        ]);

        // Staff acc
        DB::table('staffs')->insert([
            'staff_id' => '87654321',
            'first_name' => 'Carl',
            'last_name' => 'Culus',
            'email' => 'staffs@schoolture.dev',
            'password' => Hash::make('staffs'),
            'birthdate' => '1945-08-17',
            'position_id' => 2, // Teacher
        ]);
    }
}
