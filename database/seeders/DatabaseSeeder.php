<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Train;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin@mail.com',
            'password' => bcrypt('123')
        ]);

        Guest::create([
            'username' => 'guest@mail.com',
            'password' => bcrypt('123')
        ]);

        Train::create([
            'nama' => 'room 1',
            'lantai' => 1,
            'kapasitas' => 100,
            'harga' => 1000,
            'deskripsi' => "Ini adalah deskripsi room 1. Ini adalah deskripsi room 1. Ini adalah deskripsi room 1. Ini adalah deskripsi room 1. Ini adalah deskripsi room 1.",
        ]);

        Train::create([
            'nama' => 'room 2',
            'lantai' => 2,
            'kapasitas' => 200,
            'harga' => 2000,
            'deskripsi' => "Ini adalah deskripsi room. Ini adalah deskripsi room. Ini adalah deskripsi room. Ini adalah deskripsi room. Ini adalah deskripsi room.",
        ]);
    }
}
