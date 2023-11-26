<?php

namespace App\Http\Controllers;

use App\Exports\CharterExport;
use Illuminate\Http\Request;
use App\Models\Charter;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CharterController extends Controller
{
    public function index()
    {
        return view('admin.pages.charters.charters',[
            'header'=> 'Data Piagam',
            'collection' => Charter::with(['student','event'])->latest()->filter(request(['s']))->paginate(20)->withQueryString(),
            //
        ]);
    }

    public function destroy(Request $request)
    {
        Storage::delete($request->path);
        $charter = Charter::where('serial_number',$request->target);
        $charter->delete();

        return redirect(route('charter'));
    }

    public function edit(Charter $charter)
    {
        return view('admin.pages.charters.chartersedit',[
            'header'=> 'Data Piagam',
            'collection' => $charter
        ]);
    }

    public function put(Request $request, $id)
    {
        $charter = Charter::find($id);
        $charter->update([
            'serial_number'=> $request->target
            ]);
        return redirect('/charter');
    }

    public function create()
    {
        return view('admin.pages.charters.create',[
            'header'=> 'Data Piagam',
            'collection' => Event::all()
        ]) ;
    }

    public function store(Request $request)
    {

        $chartercode = 645;
        $validatedData = $request->validate([
            'student_id' => 'numeric',
            'serial_number'=> 'required',
            'path'=> 'image|file|max:2048',
            'event_id'=> 'required',
        ]);
        if(Student::find($request->student_id))
        {
            $validatedData['serial_number'] = $chartercode . $request->event_id.'-'.$request->student_id;
            $validatedData['path'] = $request->file('path')->store('charterPNG');

            Charter::create($validatedData);
        } else {
            return redirect(route('createdch'))->with('error','NISN TIDAK TERDETEKSI, silakan tambahkan di <a href="/adm/student">sini</a>');
        }

        return redirect(route('charter'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function ExportExcel()
    {
        return Excel::download(new CharterExport, 'databarcodepiagam.xlsx');
    }
}
