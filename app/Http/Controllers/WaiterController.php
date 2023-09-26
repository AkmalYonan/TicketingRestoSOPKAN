<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail_menu;
use App\Models\kategori;
use App\Models\Meja;
use App\Models\Order;
use App\Models\Pelanggan;
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
        $mejas = Meja::where('is_booked', 0)->get();

        return view('waiter.cart', compact('mejas'));
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

    public function addOrder(Request $request)
    {

        $user_id = auth()->user()->id;
        $lastId = Order::max('id');
        $idOrder = $lastId ? $lastId + 1 : 1;

        $cartItems = session()->get('cart');
        // Simpan seluruh isi session ke dalam database atau penyimpanan permanen lainnya
        foreach ($cartItems as $id => $details) {
            Detail_menu::create([
                'id_order' => $idOrder,
                'id_barang' => $details['id'],
                'subtotal' => $details['harga'] * $details['qty'],
                'quantity' => $details['qty'],
            ]);
        }
        session()->forget('cart');

        Pelanggan::create([
            'id' => $idOrder,
            'namaPelanggan' => $request->namaPelanggan,
            'jenkel' => $request->jenkel,
            'noHp' => $request->nomorHp,
            'alamat' => $request->alamat,
        ]);

        Order::create([
            'id' => $idOrder,
            'meja_id' => $request->meja,
            'pelanggan_id' => $idOrder,
            'user_id' => $user_id,
            'status' => 0,
        ]);
    }
}
