<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
    //
    public function index()
    {
        $kategoris = kategori::all();
        $menus = Barang::All();

        foreach ($kategoris as $kategori) { // Loop melalui semua kategori
            foreach ($kategori->menu as $menu) { // Loop melalui menu dalam kategori
                $menu->harga = 'Rp ' . number_format($menu->harga, 0, ',', '.');
            }
        }

        return view('waiter.index', compact('kategoris', 'menus'));
    }
}
