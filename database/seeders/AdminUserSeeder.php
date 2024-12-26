<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Membuat pengguna admin baru
        User::create([
            'name' => 'Admin',
            'email' => 'yuuta@okkotsu.com',
            'password' => Hash::make('12345') // Pastikan password di-hash
        ]);
    }
}

