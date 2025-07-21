<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id_pengguna;

        $services = Service::with(['typeservice', 'cabang'])
            ->where('id_pengguna', $userId)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('customer-dashboard', compact('services'));
    }
} 