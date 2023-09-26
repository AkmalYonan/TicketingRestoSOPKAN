<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'Pelanggan';

    protected $fillable = [
        'namaPelanggan',
        'jenkel',
        'noHp',
        'alamat',
    ];
}
