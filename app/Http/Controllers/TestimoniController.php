<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    // For API endpoint
    public function getTestimoni() {
        try {
            $allTestimoni = Testimoni::with('pengguna', 'service')->get();
            
            return response()->json([
                'message' => 'Testimoni sukses diambil',
                'testimoni' => $allTestimoni 
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get valid service for current user
    public function getValidService() {
        try {
            $user = auth()->user();
            if (!$user) {
                return response()->json([
                    'message' => 'User tidak ditemukan'
                ], 401);
            }

            // Get the latest service for this user
            $service = \App\Models\Service::where('id_pengguna', $user->id_pengguna)
                ->orderBy('id_service', 'desc')
                ->first();

            if (!$service) {
                // If no service found, return default service
                return response()->json([
                    'id_service' => 1,
                    'message' => 'Menggunakan service default'
                ]);
            }

            return response()->json([
                'id_service' => $service->id_service,
                'message' => 'Service ditemukan'
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan service',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // For admin view page
    public function index() {
        try {
            $testimoni = Testimoni::with('pengguna', 'service')
                ->orderBy('id_testimoni', 'desc')
                ->get();
            
            return view('admin-testimoni', compact('testimoni'));
            
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengambil testimoni: ' . $e->getMessage());
        }
    }
    
    public function postTestimoni(Request $request) {
        try {
            $request->validate([
                'id_pengguna' => 'required|exists:pengguna,id_pengguna',
                'id_service' => 'required|integer',
                'isi_testimoni' => 'required|string|max:1000',
                'menyoroti' => 'required|string|in:true,false',
                'rating_bintang' => 'required|integer|min:1|max:5'
            ]);

            // Cek apakah user sudah pernah mengisi testimoni untuk service ini
            $existing = Testimoni::where('id_pengguna', $request->id_pengguna)
                ->where('id_service', $request->id_service)
                ->first();
            if ($existing) {
                return response()->json([
                    'message' => 'You have already submitted a testimonial for this service.'
                ], 400);
            }

            // Check if service exists, if not use a default service
            $serviceExists = \App\Models\Service::where('id_service', $request->id_service)->exists();
            $id_service = $serviceExists ? $request->id_service : 1; // Default to service ID 1 if not found

            $testimoni = new Testimoni();
            $testimoni->id_pengguna = $request->id_pengguna;
            $testimoni->id_service = $id_service; 
            $testimoni->isi_testimoni = $request->isi_testimoni; 
            $testimoni->menyoroti = $request->menyoroti == 'true' ? 'true' : 'false';
            $testimoni->rating_bintang = $request->rating_bintang;
            $testimoni->save();
            
            return response()->json([
                'message' => 'Testimoni sukses dibuat',
                'testimoni' => $testimoni
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal membuat testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateTestimoni(Request $request, $id) {
        try {
            $testimoni = Testimoni::find($id);
            if (!$testimoni) {
                return response()->json([
                    'message' => 'Testimoni tidak ditemukan'
                ], 404);
            }

            // Toggle highlight
            if ($request->has('highlight')) {
                $testimoni->menyoroti = $request->highlight === 'true' ? 'true' : 'false';
                $testimoni->save();
            }
            
            return response()->json([
                'message' => 'Testimoni sukses diupdate',
                'testimoni' => $testimoni
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal mengupdate testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function deleteTestimoni($id) {
        try {
            $testimoni = Testimoni::find($id);
            if ($testimoni) {
                $testimoni->delete();
                return response()->json([
                    'message' => 'Testimoni sukses dihapus'
                ]);
            } else {
                return response()->json([
                    'message' => 'Testimoni tidak ditemukan'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal menghapus testimoni',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}