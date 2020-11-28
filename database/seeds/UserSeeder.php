<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        
        //$managerRole = Role::where('name', 'manager')->first();

        //$freelancerRole = Role::where('name', 'freelancer')->first();

        $admin = User::create(
        [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('senfreelance048'),
            'ref' => substr(number_format(time() * rand(),0,'',''),0,7)
        ]);
  
        
        $admin->roles()->attach($adminRole);
    }
    
}
