<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        

        $bulan = fake()->numberBetween(1, 4);
        $tanggal = fake()->numberBetween(1, 29);

        $notrans =  '2024' . sprintf('%02d', $bulan) . sprintf('%02d', $tanggal) . sprintf('%04d', fake()->unique()->numberBetween(1, 100));
        $tanggal = '2024-' . sprintf('%02d', $bulan) . '-' . sprintf('%02d', $tanggal);
        $Idpelanggan = fake()->randomElement(Pelanggan::select('id')->get());
        $totalHarga = fake()->numberBetween(1, 100) . "000";
        $metodePembayaran = fake()->randomElement(['cash', 'qris', 'transfer']);
        $userId = fake()->randomElement(User::select('id')->get());
        return [
            'id' => $notrans,
            'tanggal' => $tanggal,
            'id_pelanggan' => $Idpelanggan,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $metodePembayaran,
          
        ];
    }
}
