<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'siproced',
            'email' => 'siproced@gmail.com',
            'password' => Hash::make(12345678),
            'date1'=>'2023-02-23',
            'date2'=>'2023-02-24',
            'date3'=>'2023-02-25',            
        ]);

        DB::table('users')->insert([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => Hash::make(12345678),
            'date1'=>'2023-02-23',
            'date2'=>'2023-02-24',
            'date3'=>'2023-02-25',           
        ]);

        DB::table('users')->insert([
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
            'password' => Hash::make(12345678),
            'date1'=>'2023-02-23',
            'date2'=>'2023-02-24',
            'date3'=>'2023-02-25',            
        ]);

    }
}
