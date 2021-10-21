<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $user = User::create([
            'name' => 'user',
            'email' => 'mail@mail.com',
            'password' => Hash::make('12345678'),
            'url' => '',
        ]);
    }
}
