<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = 'admin@mail.com';
        $user->alamat = 'Jl. Kebon Jeruk No. 1';
        $user->password = Hash::make('admin');
        $user->is_admin = true;
        $user->save();

        $user = new \App\Models\User();
        $user->name = 'User';
        $user->email = 'user@mail.com';
        $user->alamat = 'Jl. Kebon Jeruk No. 2';
        $user->password = Hash::make('user');
        $user->is_admin = false;
        $user->save();
    }
}
