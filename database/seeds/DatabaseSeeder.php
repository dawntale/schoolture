<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Basic Seeder
        $this->call([
            DepartmentSeeder::class,
            GradeSeeder::class,
            ClassSeeder::class,
            PositionSeeder::class,
            SubjectSeeder::class,
        ]);

        // Model Seeder / Factory
        factory(App\Administrator::class)->create();
        factory(App\Student::class, 50)->create();
        factory(App\Staff::class, 50)->create();
    }
}
