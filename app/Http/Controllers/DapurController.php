<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class DapurController extends Controller
{
    public function index()
    {
        return view('dapur.layouts.index', [
            'title' => 'Dapur'
        ]);
    }

    public function dapur()
    {
        return view('dapur.pages.dapur', [
            'title' => 'Pesanan',
            'dataPesanan' => Buyer::latest()->get(),
            'notif' => Buyer::where('created_at', '>=', now()->subSeconds(3))->get()->count()
        ]);
    }

    public function kontak()
    {
        return view('dapur.pages.contact', [
            'title' => 'Kontak'
        ]);
    }
}
