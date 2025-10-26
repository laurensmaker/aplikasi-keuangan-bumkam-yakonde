<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Direktur Utama',
                'email' => 'direktur@mail.com',
                'password' => bcrypt('direktur123'),
                'role' => 'Direktur',
            ],
            [
                'name' => 'Bendahara Umum',
                'email' => 'bendahara@mail.com',
                'password' => bcrypt('bendahara123'),
                'role' => 'Bendahara',
            ],
            [
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@mail.com',
                'password' => bcrypt('mahasiswa123'),
                'role' => 'Mahasiswa',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']], // Hindari duplikasi
                $data
            );
        }
    }
}
