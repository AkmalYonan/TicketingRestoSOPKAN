<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexMeja()
    {
        return view('admin.meja');
    }


    public function indexMenu()
    {
        $barangs = Barang::all();
        $kategoris = kategori::all();


        foreach ($barangs as $barang) {
            $barang->harga = 'Rp ' . number_format($barang->harga, 0, ',', '.');
        }

        return view('admin.menu', compact('barangs', 'kategoris'));
    }

    public function storeMenu(Request $request)
    {
        $menu = new Barang();
        $menu->namaProduk = $request->input('namaMenu');
        $menu->harga = $request->input('hargaMenu');
        $menu->kategori_id = $request->input('kategori_id');
        $menu->save();

        return redirect()->route('admin.menu')->with('success', 'Fitur baru berhasil ditambahkan.');
    }
}
