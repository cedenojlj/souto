<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => 'pepe mujica',
            'email' => 'pepe@gmail.com',
            'pin' => 1234,                     
        ]);

        DB::table('customers')->insert([
            'name' => 'juan oviedo',
            'email' => 'juan@gmail.com',
            'pin' => 1234,                     
        ]);

        DB::table('customers')->insert([
            'name' => 'hector guerra',
            'email' => 'hector@gmail.com',
            'pin' => 1234,                     
        ]);
    }
}
