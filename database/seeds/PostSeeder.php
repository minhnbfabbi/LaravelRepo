<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [];

		for ($i = 1; $i <= 100; $i++) { 
			$users[] = [
				'title' => 'title ' . $i,
				'content' => 'content' . $i,
				'created_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s')
			];
		}
		
		Post::insert($users);
        // factory(App\Models\User::class, 3)->create();
    }
}
