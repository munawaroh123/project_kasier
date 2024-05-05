<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable =['id', 'tanggal', 'id_pelanggan','total_harga','metode_pembayaran', 'keterangan'];

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    public function pelanggan ()
    {
        return $this->belongsTo(pelanggan::class, 'id_pelanggan');
    }

}
