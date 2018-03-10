<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Administrator::class)->create();
        factory(App\Student::class, 50)->create();
        factory(App\Staff::class, 50)->create();
        factory(App\Position::class)->create();
    }
}
