<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Travel Guide'],
            ['name' => 'Study Guide'],
            ['name' => 'Medical Guide'],
            ['name' => 'Scientific Guide']
        ]);
    }
}
