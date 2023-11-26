<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateFrontController extends Controller
{
    public function downloadfile(Request $request)
    {
        // return dd($request);
        return response()->download(storage_path('app/public/'.$request->path));
    }
}
