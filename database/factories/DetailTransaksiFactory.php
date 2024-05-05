<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailTransaksi>
 */
class DetailTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Idtransaksi = fake()->randomElement(Transaksi::select('id')->get());
        $Idmenu = fake()->randomElement(Menu::select('id')->get());
        $jumlah = fake()->numberBetween(1, 5);
        $subtotal = fake()->numberBetween(1, 100) . "000";
        return [
            'id_transaksi' => $Idtransaksi,
            'id_menu' => $Idmenu,
            'jumlah' => $jumlah,
            'subtotal' => $subtotal,
        ];
    }
}
