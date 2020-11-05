<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::truncate();
        Region::create(['name' => 'Dakar']);
        Region::create(['name' => 'Thies']);
        Region::create(['name' => 'Saint Louis']);
        Region::create(['name' => 'Zinguinchor']);
        Region::create(['name' => 'Diourbel']);
        Region::create(['name' => 'Kaolack']);
        Region::create(['name' => 'Fatick']);
        Region::create(['name' => 'Tambacounda']);
        Region::create(['name' => 'Matam']);
        Region::create(['name' => 'Kolda']);
        Region::create(['name' => 'Sediou']);
        Region::create(['name' => 'Kedougou']);
    }
}
