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
                'message' => 'Gagal mengambil berita',
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
                'message' => 'Berita sukses dibuat',
                'berita' => $berita
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal membuat berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function editBerita(Request $request, $id) {
        try {
            $berita = Berita::find($id);
            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $berita->foto = $request->foto;
            $berita->save();

            return response()->json([
                'message' => 'Berita sukses diperbarui',
                'berita' => $berita
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
}

    public function deleteBerita($id) {
        try {
            $berita = Berita::find($id);
            if ($berita) {
                $berita->delete();
                return response()->json([
                    'message' => 'Berita sukses dihapus'
                ]);
            } else {
                return response()->json([
                    'message' => 'Berita tidak ditemukan'
                ])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}