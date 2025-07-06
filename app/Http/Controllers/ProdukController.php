<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function create()
    {
        return view('produk'); 
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string',
        ]);

        
        $path = $request->file('gambar')->store('uploads/featured', 'public');

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar_produk = 'storage/' . $path; 
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori = $request->kategori;
        $produk->save();
        
        //route sementara
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function index()
    {
        $produks = Produk::all();
        return view('view', compact('produks'));
    }
    
}
