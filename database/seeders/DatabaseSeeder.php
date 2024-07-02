<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Makanan;
use App\Models\Minuman;
use App\Models\Promo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'status' => 1,
            'hp' => '081234567891',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Shafa Anisya',
            'email' => 'shafa@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '085722266760',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Elisha Dayang',
            'email' => 'elisha@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '082346783926',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Beni Amar',
            'email' => 'beni@gmail.com',
            'role' => '2',
            'status' => 0,
            'hp' => '082673493274',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Muhammad Taufan Akbar',
            'email' => 'afif@gmail.com',
            'role' => '2',
            'status' => 0,
            'hp' => '081234567894',
            'password' => bcrypt('P@55word'),
        ]);
        User::create([
            'nama' => 'Nurul Reny Agustin',
            'email' => 'reny@gmail.com',
            'role' => '2',
            'status' => 0,
            'hp' => '081234567894',
            'password' => bcrypt('P@55word'),
        ]);

        Makanan::create([
            'nama_makanan' => 'Rendang',
            'harga_makanan' => '25000',
            'deskripsi_makanan' => 'Pedas Manis',
        ]);
        Makanan::create([
            'nama_makanan' => 'Ayam Gulai',
            'harga_makanan' => '23000',
            'deskripsi_makanan' => 'Pedas Manis',
        ]);

        Minuman::create([
            'nama_minuman' => 'Es Jeruk',
            'harga_minuman' => '10000',
            'deskripsi_minuman' => 'Manis Asam',
        ]);
        Minuman::create([
            'nama_minuman' => 'Jus Alpukat',
            'harga_minuman' => '15000',
            'deskripsi_minuman' => 'Manis',
        ]);

        Promo::create([
            'nama_promo' => 'Paket Nasi + Lauk dan Es Teh Manis',
            'diskon_promo' => '20%',
            'deskripsi_promo' => 'Hemat lebih banyak dengan Paket 3 in 1',
        ]);
        Promo::create([
            'nama_promo' => 'Paket Nasi + Lauk dan Es Teh Manis',
            'diskon_promo' => '10%',
            'deskripsi_promo' => 'Hemat lebih banyak dengan Paket 2 in 1',
        ]);
    }
}