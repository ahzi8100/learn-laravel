<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' =>'admin',
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('123'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'user1',
        //     'email' => 'user1@mail.com',
        //     'password' => Hash::make('123'),
        // ]);

        for($i = 1; $i <= 100; $i++) {
            DB::table('users')->insert([
                'name' => "user $i",
                'email' => "user$i@mail.com",
                'password' => Hash::make('123'),
            ]);
        };
    }
}
