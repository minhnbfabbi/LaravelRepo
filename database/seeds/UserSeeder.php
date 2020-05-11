<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [];

		for ($i = 1; $i <= 3; $i++) { 
			$users[] = [
				'name' => 'user' . $i,
				'email' => 'user' . $i . '@gmail.com',
				'password' => Hash::make('User1234'),
				'is_admin' => false
			];
		}

		$users[] = [
			'name' => 'admin',
			'email' => 'admin' . '@gmail.com',
			'password' => Hash::make('Admin123'),
			'is_admin' => true
		];
		
		User::insert($users);
        // factory(App\Models\User::class, 3)->create();
    }
}
