<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'email' => 'adinda@gmail.com',
            'name' => 'adinda',
            'username'=> 'adindamp',
            'address' => 'Bogor',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
