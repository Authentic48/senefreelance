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
        Category::create(['name' => 'Batiment Et Construction']);
        Category::create(['name' => 'Froid Et Climatisation']);
        Category::create(['name' => 'Banque Et Finance']);
        Category::create(['name' => 'Droit']);
        Category::create(['name' => 'Plomberie Et Sanitaire']);
        Category::create(['name' => 'Beauté']);
        Category::create(['name' => 'Marketing Digital']);
        Category::create(['name' => 'Logistique']);
        Category::create(['name' => 'Artisanat']);
        Category::create(['name' => 'Tourisme']);
        Category::create(['name' => 'Elevage']);
        Category::create(['name' => 'Transport']);
        Category::create(['name' => 'Commerce']);
        Category::create(['name' => 'Agriculture']);
        Category::create(['name' => 'Influenceurs']);
        Category::create(['name' => 'Medecine Et Pharmacie']);
        Category::create(['name' => 'Biologie']);
        Category::create(['name' => 'Reseaux Et Telecommunication']);
        Category::create(['name' => 'Infographie']);
        Category::create(['name' => 'Audit']);
        Category::create(['name' => 'Assurance']);
        Category::create(['name' => 'Audiovisuel']);
        Category::create(['name' => 'Menuiserie']);
    }
}
