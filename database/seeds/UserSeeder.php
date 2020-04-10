<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$listRole= 
		[
		    'admin', 
		    'staff'
		];   	

		foreach ($listRole as $Role) {
        	Factory(App\User::class,1)->create(['role' => $Role]);
        }
        
    }
}
