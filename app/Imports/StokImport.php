<?php

namespace App\Imports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stok([

            'jumlah' => $row['jumlah'],
            'menu_id' => $row['menu_id'],
    
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}