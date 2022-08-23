<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('123456'),
            'remember_token' => Str::random(10),
            'is_admin'  => 1
        ]);
    }
}
