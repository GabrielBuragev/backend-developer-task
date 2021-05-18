<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'password' => Hash::make('strongpassword'),
            'email' => 'john@doe'
        ]);
        User::create([
            'name' => 'Jane Doe',
            'password' => Hash::make("strongerpassword"),
            "email" => "jane@doe"
        ]);
    }
}
