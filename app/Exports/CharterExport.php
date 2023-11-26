<?php

namespace App\Exports;

use App\Models\Charter;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class CharterExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('exportsbarcode',[
            'collection'=> Charter::with(['student','event'])->get()
        ]);
    }
}
