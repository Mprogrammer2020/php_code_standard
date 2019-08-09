<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $users = [
    		[
	    		'name' => 'Super Admin',
	    		'email' => 'admin@yopmail.com',
	    		'password' => '$2y$10$379Y9svE76.f7afgO7cExuQBZxpxbg3o84HYFTKLwmjVn/YWDFXmm',
	    		'phone' => '01234567890',
	    		'user_type' => '1',
	    		'created_at' => date('Y-m-d H:i:s')
    		],
    	];

        //INSERT DATA INTO VISITOR TYPES TABLE
        \DB::table('users')->insert($users);
    }
}
