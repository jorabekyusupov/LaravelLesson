<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::unprepared(file_get_contents(base_path('database/sql/products.sql')));
      DB::unprepared(file_get_contents(base_path('database/sql/stores.sql')));
    }
}
