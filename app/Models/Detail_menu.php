<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_menu extends Model
{
    use HasFactory;

    protected $table = 'detail_menu';

    protected $fillable = [
        'id_order',
        'id_barang',
        'quantity',
        'subtotal'
    ];
}
