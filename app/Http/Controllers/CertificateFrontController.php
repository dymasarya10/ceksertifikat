<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Crypt;

class CertificateFrontController extends Controller
{
    public function index()
    {
        return view('front.pages.certificate', [
            'heading' => 'Cari Data Sertifikat',
            'collection' => Certificate::with(['student', 'event'])->latest()->filter(request(['s']))->paginate(5)->withQueryString(),
        ]);
    }

    public function scan()
    {
        return view('front.pages.scancrt', [
            'heading' => 'Cari Data Sertifikat'
        ]);
    }

    public function checkscan(Request $request)
    {
        $splited = explode(':', $request->code);
        $decrypted = base64_decode($splited[0]);
        $charter = Certificate::where('serial_number', $decrypted);
        $auth = '';
        if ($charter->count()) {
            $auth = 'certified';
        }
        return view('front.pages.certified.certified', [
            'auth' => $auth,
            'heading' => 'Cari Data Piagam',
            'charter' => $charter->get('path'),
            'message' => 'Data Sertifikat Tidak Ditemukan'
        ]);
    }

    public function downloadfile(Request $request)
    {
        // return dd($request);
        return response()->download(storage_path('app/public/' . $request->path));
    }


}
