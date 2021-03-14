<?php

namespace Database\Seeders;

use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('levels')->insert([
          [
              'name' => 'Dễ',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'name' => 'Trung bình',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ],
          [
              'name' => 'Khó',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
          ]
      ]);
    }
}
