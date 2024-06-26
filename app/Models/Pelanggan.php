<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable =['nama', 'email','no_telp','alamat'];

    public function transaksis(){
        return $this->hasMany(transaksi::class, 'pelanggan_id', 'id');
    }
}
