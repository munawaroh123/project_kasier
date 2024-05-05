<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    protected $table = 'produkt';
    protected $guarded =['id'];

    public function jenis()
    {
      return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
