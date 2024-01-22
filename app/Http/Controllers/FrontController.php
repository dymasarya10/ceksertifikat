<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Crypt;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.pages.homepage', [
            'title' => 'Cek Sertifikat Labitech',
            'value' => ''
        ]);
    }

    public function checkdata()
    {
        try {
            $file = File::where('barcode', $_GET['target']);
            if (Crypt::decrypt($_GET['button']) === 'soft') {
                return view('front.pages.soft', [
                    'title' => 'Cek Sertifikat Labitech',
                    'collection' => $file->get()
                ]);
            } else {
                return view('front.pages.photo', [
                    'title' => 'Cek Sertifikat Labitech',
                    'collection' => $file->get()
                ]);
            }
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Tangani kesalahan dekripsi di sini
            return redirect(route('home'));
        }
    }

    public function scan()
    {
        return view('front.pages.scan', [
            'title' => 'Cek Sertifikat Labitech',
        ]);
    }

    public function result(Request $request)
    {
        return view('front.pages.homepage', [
            'title' => 'Cek Sertifikat Labitech',
            'value' => $request->code
        ]);
    }

    public function downloadFile(Request $request)
    {
        return response()->download(storage_path('app/public/' . $request->path));
        ;
    }
}
