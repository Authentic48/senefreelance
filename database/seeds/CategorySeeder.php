<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Informatique']);
        Category::create(['name' => 'Education']);
        Category::create(['name' => 'Construction']);
        Category::create(['name' => 'Froid Et Climatisation']);
        Category::create(['name' => 'Beaute']);
        Category::create(['name' => 'Comptable']);
        Category::create(['name' => 'Avocat']);
        Category::create(['name' => 'Freelancers']);
    }
}
