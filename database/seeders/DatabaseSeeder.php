<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Pak Arif',
            'username' => 'menu',
            'password' => bcrypt('0016253768'),
            'role' => 3
        ]);

        User::create([
            'name' => 'Dapur',
            'username' => 'dapur',
            'password' => bcrypt('0016253768'),
            'role' => 2
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('0016253768'),
            'role' => 1
        ]);

        // Product::create([
        //     'nama' => 'Panadeoman',
        //     'harga' => 23000,
        //     'gambar' => 'eat1.png'
        // ]);

        // Product::create([
        //     'nama' => 'Lemonade Tente',
        //     'harga' => 13000,
        //     'gambar' => 'eat2.png'
        // ]);

        // Product::create([
        //     'nama' => 'Buburealo',
        //     'harga' => 19000,
        //     'gambar' => 'eat3.png'
        // ]);

        // Product::create([
        //     'nama' => 'Samyana',
        //     'harga' => 25000,
        //     'gambar' => 'eat5.png'
        // ]);

        // Product::create([
        //     'nama' => 'Nasa Gara',
        //     'harga' => 20000,
        //     'gambar' => 'eat4.png'
        // ]);

        // Product::create([
        //     'nama' => 'Nasa Gara Level 2',
        //     'harga' => 22000,
        //     'gambar' => 'eat4.png'
        // ]);
    }
}
