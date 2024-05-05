<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DetailTransaksi;
use App\Models\Jenis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $makanan = Jenis::create([
            'nama_jenis' => 'Makanan'
        ]);
        
        $minuman = Jenis::create([
            'nama_jenis' => 'Minuman'
        ]);
        $minuman = Jenis::create([
            'nama_jenis' => 'Camilan'
        ]);
        $this->call(PelangganSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(JenisSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(stokSeeder::class);
        $this->call(TransaksiSeeder::class);
        $this->call(DetailTransaksiSeeder::class);

    }
}
