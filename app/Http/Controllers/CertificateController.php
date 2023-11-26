<?php

namespace App\Http\Controllers;

use App\Exports\CertificateExport;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\Event;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{

    public function index()
    {
        return view('admin.pages.certificate.certificates', [
            'header' => 'Data Sertifikat',
            'collection' => Certificate::with(['student', 'event'])->latest()->filter(request(['s']))->paginate(20)->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.pages.certificate.create', [
            'header' => 'Data Sertifikat',
            'collection' => Event::all()
        ]);
    }

    public function store(Request $request)
    {
        $chartercode = 761;
        $validatedData = $request->validate([
            'student_id' => 'numeric',
            'serial_number'=> 'required',
            'path'=> 'image|file|max:2048',
            'event_id'=> 'required',
        ]);
        if(Student::find($request->student_id))
        {
            $validatedData['serial_number'] = $chartercode . $request->event_id.'-'.$request->student_id;
            $validatedData['path'] = $request->file('path')->store('certificatePNG');

            Certificate::create($validatedData);
        } else {
            return redirect(route('createcrt'))->with('error','NISN TIDAK TERDETEKSI, silakan tambahkan di <a href="/adm/student">sini</a>');
        }

        return redirect(route('certificate'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Request $request)
    {
        Storage::delete($request->path);
        $charter = Certificate::where('serial_number',$request->target);
        $charter->delete();

        return redirect(route('certificate'))->with('success','Data berhasil dihapus');
    }

    public function ExportExcel()
    {
        return Excel::download(new CertificateExport, 'databarcodecertificate.xlsx');
    }
}
