<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Cabang;
use App\Models\Service;
use App\Models\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ServiceController extends Controller
{

    public function validateslot(Request $request)
    {
        $date = $request->query('date');
        $id_cabang = $request->query('id_cabang');
        $lokasi = $request->query('lokasi');

        if (!$date || !$id_cabang) {
            return response()->json(['error' => 'missing date or id_cabang'], 400);
        }

        try {
            $bookingDate = Carbon::parse($date)->startOfDay();
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid date format'], 400);
        }

        $now = Carbon::now();
        $slots = ["09:00", "11:00", "13:00", "15:00"];
        $availableSlots = [];

        foreach ($slots as $slot) {
            $slotDateTime = Carbon::parse($date . ' ' . $slot);
            $isPast = $slotDateTime->lt($now);

            $count = DB::table('service')
                ->whereDate('tanggal', $slotDateTime->toDateString())
                ->where('jadwal', $slot)
                ->where('id_cabang', $id_cabang)
                ->whereIn('status', ['pend', 'done'])
                ->count();
        
            $slotFull = $count >= 1;
        
            $slotData = [
                'time' => $slot,
                'available' => !$slotFull && !$isPast,
            ];
        
            if ($slotFull) {
                $slotData['reason'] = 'full';
            } elseif ($isPast) {
                $slotData['reason'] = 'passed';
            }
        
            $availableSlots[] = $slotData;
        }
        
        Log::info('Validating slot', $request->all());

        return response()->json($availableSlots);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required|integer',
            'id_tipe_service' => 'required|integer',
            'id_cabang' => 'required|integer',
            'tanggal' => 'required|date',
            'keluhan' => 'nullable|string',
            'jadwal' => 'required|date_format:H:i',
        ]);

        // Cari id_tipe_service jika yang dikirim string nama
        $idTipeService = $request->id_tipe_service;
        if (!is_numeric($idTipeService)) {
            $type = \App\Models\TypeService::where('nama_service', $idTipeService)->first();
            if ($type) {
                $idTipeService = $type->id_tipe_service;
            } else {
                return redirect()->back()->withErrors(['id_tipe_service' => 'Tipe service tidak valid.'])->withInput();
            }
        }

        $existing = Service::where('id_pengguna', $request->id_pengguna)
            ->whereDate('tanggal', $request->tanggal)
            ->whereIn('status', ['pen', 'fin'])
            ->exists();

        if ($existing) {
            return redirect()->back()
                ->withErrors(['tanggal' => 'Kamu sudah melakukan booking di tanggal tersebut.'])
                ->withInput();
        }

        $service = new Service();
        $service->id_pengguna = $request->id_pengguna;
        $service->id_tipe_service = $idTipeService;
        $service->id_cabang = $request->id_cabang;
        $service->tanggal = $request->tanggal;
        $service->keluhan = $request->keluhan;
        $service->jadwal = $request->jadwal;
        $service->status = 'pend';
        Log::info('Service to be saved', $service->toArray());
        $saved = $service->save();
        Log::info('Service save result', ['saved' => $saved]);


        //route sementara
        return redirect()->route('customer.dashboard')->with('success', 'Service successfully added');

    }

    public function getServiceTypes()
    {
        $types = TypeService::whereIn('nama_service', ['daily', 'racing1', 'racing2'])->get();
        return response()->json($types);
    }

    public function getServiceCabang()
    {
        $cabangs = Cabang::all();
        return response()->json($cabangs);
    }

    public function indexByUser()
    {
        $userId = Auth::user()->id_pengguna;

        $services = Service::where('id_pengguna', $userId)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('service.index', compact('services'));
    }

    
    public function create()
    {
        // Ambil data cabang dan tipe service untuk dropdown
        $cabangs = Cabang::all();
        $types = TypeService::all();
        return view('service.create', compact('cabangs', 'types'));
    }

    public function cancel($id)
    {
        $userId = Auth::user()->id_pengguna;

        $service = Service::where('id_service', $id)
            ->where('id_pengguna', $userId)
            ->first();

        if (!$service) {
            return redirect()->back()->with('error', 'Booking tidak ditemukan atau bukan milik Anda.');
        }

        if ($service->status !== 'pend') {
            return redirect()->back()->with('error', 'Hanya booking dengan status "pending" yang bisa dibatalkan.');
        }

        $service->status = 'cancel';
        $service->save();

        return redirect()->route('customer.dashboard')->with('success', 'Booking berhasil dibatalkan.');
    }

    public function indexBycabang()
    {
        $cabang = Auth::user()->adminDetail?->id_cabang;

        $services = Service::where('id_cabang', $cabang)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('service.index', compact('services'));
    }

    public function startService($id)
{
    $service = Service::findOrFail($id);

    if ($service->status !== 'pend') {
        return response()->json([
            'success' => false,
            'message' => 'Hanya booking dengan status pending yang bisa diproses.'
        ]);
    }

    $service->status = 'pros';
    $service->started_at = now();
    $service->save();

    return response()->json([
        'success' => true,
        'message' => 'Status berhasil diubah ke process.'
    ]);
}

    public function adminBooking()
    {
        $services = Service::with(['pengguna', 'typeservice', 'cabang'])
            ->orderBy('tanggal', 'desc')
            ->get();
        
        $produk = \App\Models\Produk::all();
        
        return view('admin-booking-service', compact('services', 'produk'));
    }

}