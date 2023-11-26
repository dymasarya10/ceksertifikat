<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charter;
use Illuminate\Support\Facades\Crypt;
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
        try {
            $decrypted = Crypt::decrypt($request->code);
            $charter = Charter::where('serial_number', $decrypted);
            $auth = '';
            if ($charter->count()) {
                $auth = 'certified';
            }
            return view('front.pages.certified.certified', [
                'auth' => $auth,
                'heading' => 'Cari Data Piagam',
                'charter' => $charter->get('path'),
            ]);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            return ('code salah');
        }
    }

    public function downloadfile(Request $request)
    {
        // return dd($request);
        return response()->download(storage_path('app/public/'.$request->path));
    }
}
