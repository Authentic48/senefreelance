<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Category;
use App\Region;

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
            UserSeeder::class,
            RoleSeeder::class,
            CategorySeeder::class,
            RegionSeeder::class,
        ]);
    }
}
