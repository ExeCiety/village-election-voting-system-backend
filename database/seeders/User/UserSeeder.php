<?php

namespace Database\Seeders\User;

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
        $now = now();

        DB::table('users')->insert([
            'name' => 'Petugas 01',
            'username' => 'petugas01',
            'password' => Hash::make('petugas01'),
            'created_at' => $now,
            'updated_at' => $now
        ]);
    }
}
