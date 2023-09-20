<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Buyer;

class ProductController extends Controller
{
    public function index()
    {
        return view('pelanggan.pages.menu', [
            'title' => 'Menu',
            'menus' => Product::latest()->paginate(4)
        ]);
    }

    public function addToCart($id)
    {
        $menu = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $menu->id,
                'nama' => $menu->nama,
                'harga' => $menu->harga,
                'gambar' => $menu->gambar,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu Berhasil ditambahkan');
    }

    public function cart()
    {
        return view('pelanggan.pages.cart', [
            'title' => 'Keranjang'
        ]);
    }

    public function empty(Request $request)
    {
        $request->session()->forget(['cart']);
        return redirect('/cart');
    }

    public function store(Request $request)
    {
        // dd($request->request);

        $buyer = $request->validate([
            'nama' => 'required',
            'hp' => 'required',
            'meja' => 'required'
        ]);

        $transaksi = $request->validate([
            'total' => 'required',
            'nama' => 'required',
            'hp' => 'required',
            'meja' => 'required',
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $model_buyer = Buyer::create($buyer);
        if ($model_buyer) {
            foreach ($request->product_id as $key => $value) {
                $model_trasaksi = Transaction::create([
                    'buyer_id' => $model_buyer->id,
                    'product_id' => $value,
                    'quantity' => $request->quantity[$key],
                    'total' => $request->total[$key]
                ]);
            };
        };


        return redirect('/cart')->with('success', 'Order Berhasil dilakukan');
    }

    public function hapusItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Item berhasil dihapus');
        }
    }
}
