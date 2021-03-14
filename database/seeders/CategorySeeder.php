<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categories')->insert([
           [
               'name' => 'Lập trình',
               'slug' => 'lap-trinh',
               'description' => 'Học về lập trình',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ],
           [
               'name' => 'Tiếng anh',
               'slug' => 'tieng-anh',
               'description' => 'Học về tiếng anh',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ],
           [
               'name' => 'Toán học',
               'slug' => 'toan-hoc',
               'description' => 'Học về toán học',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
           ]
       ]);
    }
}
