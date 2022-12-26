<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'user_type' => "Admin",
            'name' => "Shatu Das",
            'email' => "admin@app.com",
            'password' => Hash::make('password'),
            'delete_able' => false,
            'remember_token' => Str::random(10),
        ]);

        User::create([
        	'user_type' => "User",
            'name' => "Sohel Das",
            'email' => "user@app.com",
            'password' => Hash::make('password'),
            'delete_able' => false,
            'remember_token' => Str::random(10),
        ]);
    }
}
