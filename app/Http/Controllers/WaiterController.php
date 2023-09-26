<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\kategori;
use Illuminate\Contracts\Session\Session;
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

    public function showCart()
    {
        return view('waiter.cart');
    }

    public function addCart($id)
    {
        $menu = Barang::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "id" => $menu->id,
                "namaProduk" => $menu->namaProduk,
                "harga" => $menu->harga,
                "kategori_id" => $menu->kategori_id,
                "qty" => 1,
            ];
        }

        session()->put('cart', $cart);
        // dd(Session::get('cart'));
        return redirect()->back()->with('success', 'Barang telah berhasil di tambahkan');
    }

    public function removeItem($id)
    {
        if (session()->has('cart') && array_key_exists($id, session('cart'))) {
            $cart = session('cart');
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back();
    }

    public function updateQty(Request $request, $id)
    {
        $action = $request->input('action');

        if (session()->has('cart') && array_key_exists($id, session('cart'))) {
            $cart = session('cart');

            if ($action === 'increase') {
                $cart[$id]['qty']++;
            } elseif ($action === 'decrease' && $cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
            }

            session(['cart' => $cart]);
        }

        return redirect()->back();
    }
}
