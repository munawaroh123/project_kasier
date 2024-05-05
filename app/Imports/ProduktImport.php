<?php

namespace App\Imports;

use App\Models\Produkt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduktImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            // dd($row);
            return new Produkt([
             'id_jenis' => auth()->user()->id_jenis,
             'nama_produk' => $row['nama_produk'],
             'nama_supplier' => $row['nama_supplier'],
             'harga_beli' => $row['harga_beli'],
             'harga_beli' => $row['harga_jual'],
             'stok' => $row['stok'],
        ]);
    }
    
    public function headingRow(): int
    {
        return 3;
    }
}
