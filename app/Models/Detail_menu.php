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
<<<<<<< HEAD
        'subtotal'
=======
        'subtotal',
>>>>>>> be79448ba31c19207eb23571332cca4924f243a0
    ];
}
