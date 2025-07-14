<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Produk;
use App\Models\Service;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $testimoniCount = Testimoni::count();
        $produkCount = Produk::count() ?? 0;
        $serviceCount = Service::count() ?? 0;
        $beritaCount = Berita::count() ?? 0;

        $recentTestimoni = Testimoni::with(['pengguna', 'service'])
            ->orderBy('id_testimoni', 'desc')
            ->take(5)
            ->get();
        
        // Get recent products
        $recentProduk = Produk::orderBy('id_produk', 'desc')
            ->take(5)
            ->get();
        
        // Get recent services/bookings
        $recentServices = Service::with('pengguna')
            ->orderBy('id_service', 'desc')
            ->take(5)
            ->get();
        
        // Get recent news
        $recentBerita = Berita::orderBy('id_berita', 'desc')
            ->take(5)
            ->get();
        
        return view('admin-dashboard', compact(
            'testimoniCount',
            'produkCount', 
            'serviceCount',
            'beritaCount',
            'recentTestimoni',
            'recentProduk',
            'recentServices',
            'recentBerita'
        ));
    }
}