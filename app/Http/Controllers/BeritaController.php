<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Exception;

class BeritaController extends Controller
{
    public function getBerita() {
        try {
            $berita = Berita::all();
            return response()->json([
                'message' => 'Berita sukses diambil',
                'berita' => $berita 
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function postBerita(Request $request) {
        try {
            $berita = new Berita();
            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $berita->foto = $request->foto;
            $berita->save();

            return response()->json([
                'message' => 'Berita created successfully',
                'berita' => $berita
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}