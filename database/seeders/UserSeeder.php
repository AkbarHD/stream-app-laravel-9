<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // IMPORT DB
use Illuminate\Support\Facades\Hash; // import encriypt password

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Akbarasd',
            'email' => 'akbarhossam321@gmail.com',
            'password' => Hash::make('12345678'),
            'phone_number' => '0895414587000',
            'avatar' => '',
            'role' => 'admin',
            'created_at' => now(), // agar mengambil waktu skrang
            'updated_at' => now(),
        ]);
    }
}
