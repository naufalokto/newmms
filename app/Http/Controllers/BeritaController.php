<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index() {
        return view('admin-berita');
    }

    public function getBerita() {
        try {
            $berita = Berita::orderBy('created_at', 'desc')->get();
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

    public function getBeritaById($id) {
        try {
            $berita = Berita::find($id);
            if ($berita) {
                return response()->json([
                    'success' => true,
                    'berita' => $berita
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Berita tidak ditemukan'
                ])->setStatusCode(404);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil berita',
                'error' => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function postBerita(Request $request) {
        try {
            $request->validate([
                'judul_berita' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'konten' => 'nullable|string',
                'judul' => 'nullable|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $berita = new Berita();
            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $berita->konten = $request->konten;
            $berita->judul = $request->judul;

            // Handle file upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berita', $filename, 'public');
                $berita->foto = $path;
            }

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
            $request->validate([
                'judul_berita' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'konten' => 'nullable|string',
                'judul' => 'nullable|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $berita = Berita::find($id);
            if (!$berita) {
                return response()->json([
                    'message' => 'Berita tidak ditemukan'
                ])->setStatusCode(404);
            }

            $berita->judul_berita = $request->judul_berita;
            $berita->deskripsi = $request->deskripsi;
            $berita->konten = $request->konten;
            $berita->judul = $request->judul;

            // Handle file upload
            if ($request->hasFile('foto')) {
                // Delete old file if exists
                if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                    Storage::disk('public')->delete($berita->foto);
                }
                
                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('berita', $filename, 'public');
                $berita->foto = $path;
            }

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
                // Delete associated file if exists
                if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                    Storage::disk('public')->delete($berita->foto);
                }
                
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