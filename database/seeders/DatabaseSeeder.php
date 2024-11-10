<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Mendefinisikan role yang ada
        $roles = [
            [
                'nama' => 'Super Admin',
            ],
            [
                'nama' => 'Admin',
            ],
            [
                'nama' => 'Kasir',
            ],
        ];

        // Menyimpan role ke dalam database
        foreach ($roles as $role) {
            Role::create($role);
        }

        // Data pengguna yang akan dimasukkan ke dalam database
        $data = [
            [
                'nama' => 'Super Admin',
                'email' => 'superadmin@admin.test',
                'password' => bcrypt('superadmin'),
                'role_id' => 1, // ID Superadmin
            ],
            [
                'nama' => 'Admin',
                'email' => 'admin@admin.test',
                'password' => bcrypt('admin'),
                'role_id' => 2, // ID Admin
            ],
            [
                'nama' => 'Kasir',
                'email' => 'kasir@kasir.test',
                'password' => bcrypt('kasir'),
                'role_id' => 3, // ID Kasir
            ],
        ];

        // Menyimpan pengguna ke dalam database
        foreach ($data as $user) {
            User::create($user);
        }
    }
}
