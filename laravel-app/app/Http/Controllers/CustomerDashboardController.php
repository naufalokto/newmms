<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $message = session('login_status', 'Berhasil login sebagai customer!');
        return view('customer_dashboard', compact('message'));
    }
} 
