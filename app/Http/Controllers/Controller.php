<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('pelanggan.layouts.index', [
            'title' => 'Home'
        ]);
    }

    public function menu()
    {
        return view('pelanggan.pages.menu', [
            'title' => 'Menu'
        ]);
    }

    public function kontak()
    {
        return view('pelanggan.pages.contact', [
            'title' => 'Kontak'
        ]);
    }

    public function cart()
    {
        return view('pelanggan.pages.cart', [
            'title' => 'Keranjang'
        ]);
    }

    public function checkout()
    {
        return view('pelanggan.pages.checkout', [
            'title' => 'CheckOut'
        ]);
    }
}
