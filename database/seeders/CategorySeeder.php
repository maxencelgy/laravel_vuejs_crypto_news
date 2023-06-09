<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
       for ($i = 0; $i < 5; $i++) {
           DB::table('categories')->insert([
               'title' => 'Category ' . $i,
           ]);
       }
    }
}
