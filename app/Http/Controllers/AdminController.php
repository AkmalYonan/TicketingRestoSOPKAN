<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use App\Models\Meja;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexMeja()
    {
        $mejas = Meja::paginate(10);
        return view('admin.meja', compact('mejas'));
    }

    protected function getLastMejaNumber()
    {
        $lastMeja = Meja::latest('nomor')->first();

        if ($lastMeja) {
            return $lastMeja->nomor;
        } else {
            return 0;
        }
    }

    public function storeMeja(Request $request)
    {
        $meja = $request->input('nomorMeja');
        $lastMejaNumber = $this->getLastMejaNumber();

        for ($i = 1; $i <= $meja; $i++) {
            $lastMejaNumber++;
            Meja::create(['nomor' => $lastMejaNumber]);
        }

        return redirect()->route('admin.meja')->with('success', 'Fitur baru berhasil ditambahkan.');
    }

    public function hapusMeja(Request $request)
    {
        $jumlahMejaHapus = $request->input('nomorMeja');
        $lastMejaNumber = $this->getLastMejaNumber();

        if ($jumlahMejaHapus > 0 && $lastMejaNumber >= $jumlahMejaHapus) {
            Meja::where('is_booked', 0)
                ->where('nomor', '>', $lastMejaNumber - $jumlahMejaHapus)
                ->delete();
            return redirect()->route('admin.meja')->with('success', 'Meja berhasil dihapus.');
        } else {
            return redirect()->route('admin.meja')->with('error', 'Gagal menghapus meja. Jumlah meja yang dihapus melebihi batas atau tidak valid.');
        }
    }

    // public function editMeja(Request $request, $id)
    // {
    //     $meja = Meja::find($id);

    //     $meja->nomor = $request->input('editMeja');
    //     $meja->save();

    //     return redirect()->route('admin.meja')->with('success', 'Nomor Meja berhasil diperbarui.');
    // }


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

    public function ubahMenu($id)
    {
        $menu = Barang::find($id);
        $kategoris = kategori::all();
        return view('admin.edit-menu', compact('menu', 'kategoris'));
    }

    public function editMenu(Request $request, $id)
    {
        $menu = Barang::find($id);

        $menu->namaProduk = $request->input('namaMenu');
        $menu->harga = $request->input('hargaMenu');
        $menu->kategori_id = $request->input('kategori_id');
        $menu->save();

        return redirect()->route('admin.menu')->with('success', 'Nama Menu berhasil diperbarui.');
    }

    public function hapusMenu($id)
    {

        $menu = Barang::find($id);

        if (!$menu) {
            return redirect()->route('admin.menu')->with('error', 'Data menu tidak ditemukan.');
        }
        $menu->delete();

        return redirect()->route('admin.menu')->with('success', 'Data menu berhasil dihapus.');
    }
}
