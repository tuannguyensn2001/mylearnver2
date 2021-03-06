<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            LevelSeeder::class,
            StatusSeeder::class,
            TagSeeder::class,
            AdminSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
