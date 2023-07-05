<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'total',
        'nama',
        'bayar',
        'kembali'
    ];

    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaction::class);
    }
}
