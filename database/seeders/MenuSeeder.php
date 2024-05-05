<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Stok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [
            [
                'jenis_id' => '1',
                'nama_menu' => 'Mie',
                'harga' => '10000',
                'stok' => '100',
                'deskripsi' => '',
            ],
            [
                'jenis_id' => '2',
                'nama_menu' => 'Nutrisari',
                'harga' => '5000',
                'stok' => '200',
                'deskripsi' => '',
            ],
            [
                'jenis_id' => '3',
                'nama_menu' => 'Keripik kentang',
                'harga' => '3000',
                'stok' => '200',
                'deskripsi' => '',
            ],
            [
                'jenis_id' => '4',
                'nama_menu' => 'Es teh',
                'harga' => '5000',
                'stok' => '100',
                'deskripsi' => '',
            ],
            [
                'jenis_id' => '5',
                'nama_menu' => 'Mochi',
                'harga' => '4000',
                'stok' => '300',
                'deskripsi' => '',
            ]
    
        ];
        foreach ($menu as $key => $value) {
            Menu::create($value);
        }
        }
    }
    
