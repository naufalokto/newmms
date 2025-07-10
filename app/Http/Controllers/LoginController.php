<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\PenggunaAdmin;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = Pengguna::where('username', $request->username)->first();

        if (!$user) {
            \Log::info('Login gagal: username tidak ditemukan', ['username' => $request->username]);
            return back()->withErrors(['username' => 'Username atau password salah'])->withInput();
        }

        if (!\Hash::check($request->password, $user->password)) {
            \Log::info('Login gagal: password salah', ['username' => $request->username]);
            return back()->withErrors(['username' => 'Username atau password salah'])->withInput();
        }

        \Log::info('Login berhasil', ['username' => $user->username, 'peran' => $user->peran]);
        \Auth::login($user); 
        $user = Pengguna::with('adminDetail')->find($user->id_pengguna); 
        
        if ($user->peran === 'cust') {
            return redirect('/customerdashboard');
        } elseif ($user->peran === 'admin') {
            $idCabang = $user->adminDetail?->id_cabang;
            \Log::info('Login berhasil', ['id_cabang' => $idCabang]);
            \Log::info('Admin detail:', [$user->adminDetail]);
            return redirect('/admin/dashboard');
        } else {
            \Auth::logout();
            \Log::info('Login gagal: peran tidak dikenali', ['username' => $user->username, 'peran' => $user->peran]);
            return back()->withErrors(['username' => 'Peran tidak dikenali'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout berhasil']);
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
