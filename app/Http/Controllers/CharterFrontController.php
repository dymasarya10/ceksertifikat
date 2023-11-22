<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charter;
use Illuminate\Support\Facades\Storage;

class CharterFrontController extends Controller
{
    public function index()
    {
        return view('front.pages.charter', [
            'heading' => 'Cari Data Piagam',
            'collection' => Charter::with(['student', 'event'])->latest()->filter(request(['s']))->paginate(5)->withQueryString(),
        ]);
    }

    public function scan()
    {
        return view('front.pages.scan', [
            'heading' => 'Cari Data Piagam'
        ]);
    }

    public function checkscan(Request $request)
    {
        $auth = '';
        if (Charter::where('serial_number', $request->code)->count()) {
            $auth = 'certified';
        }
        return view('front.pages.certified.certified', [
            'auth' => $auth,
            'heading' => 'Cari Data Piagam'
        ]);
    }

    public function downloadfile($filename)
    {
        // Path ke file di direktori penyimpanan
        $filePath = storage_path('app/' . $filename);

        // Periksa apakah file ada
        if (Storage::exists($filename)) {
            // Buat respons untuk file
            return response()->download($filePath, $filename);

        } else {
            // File tidak ditemukan
            return dd(false);
        }
    }
}
