<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.pages.home', [
            'title' => 'Home',
            'todayIncome' => Transaction::whereDate('created_at', today())->sum('total'),
            'monthIncome' => Transaction::whereMonth('created_at', now()->month)->sum('total'),
            'countMenu' => Product::count('nama'),
            'visitor' => Buyer::whereDate('created_at', today())->count('id'),
            'favoritMenu' => Product::all()
            // select('product_id', DB::raw('count(*) as total'))->groupBy('product_id')->orderByDesc('total')->first()->product()
        ]);
    }

    public function menu()
    {
        return view('admin.pages.menu', [
            'title' => 'Menu',
            'menus' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $menuValidate = $request->validate([
            'nama' => 'required|min:5',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:png|max:2048'
        ]);

        if ($request->file('gambar')) {
            $menuValidate['gambar'] = $request->file('gambar')->store('posts');
        }

        Product::create($menuValidate);

        return redirect('/adminmenu')->with('success', 'Menu berhasil ditambahkan');
    }

    public function delete($id)
    {

        $model = Product::findOrFail($id);
        // dd($model->gambar);


        Storage::delete($model->gambar);
        $model->delete();

        return redirect('/adminmenu')->with('success', 'Menu berhasil dihapus');
    }

    public function detailMenu($id)
    {
        $detailMenu = Product::findOrFail($id);
        return view('admin.pages.menu', [
            'detailMenu' => $detailMenu
        ]);
    }

    public function kasir()
    {
        return view('admin.pages.kasir', [
            'title' => 'Kasir',
            'kasirData' => Buyer::all()
        ]);
    }

    public function cetak($id)
    {
        return view('admin.pages.struk', [
            'dataStruk' => Buyer::findOrFail($id)
        ]);
    }

    public function statusDone($id)
    {
        $model = Buyer::findOrFail($id);

        $model->status = 1;

        $model->save();

        return redirect('/admin/kasir')->with('success', 'Trasaksi ' . $model->nama . ' Selesai');
    }

    public function laporan()
    {
        return view('admin.pages.laporan', [
            'title' => 'Laporan',
            'dataPenjualan' => Product::all()
        ]);
    }
}
