<?php

namespace App\Http\Controllers;

use App\Imports\FileImport;
use Illuminate\Http\Request;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard',[
            'title' => 'Admin Sertifikat Labitech',
            'header' => 'Data Sertifikat',
            'subheader' => 'Berikut adalah data sertifikat sekolah Labitech',
            'collection' => File::filter(request(['s']))->latest()->paginate(10)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.pages.create',[
            'title' => 'Admin Sertifikat Labitech',
            'header' => 'Data Sertifikat',
            'subheader' => 'Tambah data sertifikat',
        ]);
    }

    public function show(File $file)
    {
        return view('admin.pages.edit',[
            'title' => 'Admin Sertifikat Labitech',
            'header' => 'Data Sertifikat',
            'subheader' => 'Edit Data',
            'collection' => $file
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'identity_number' => 'numeric',
            'name' => 'required',
            'barcode' => 'required',
            'type' => 'required',
            'event' => 'required',
            'path'=> 'image|file|max:2048',
        ]);

        if($request->type === '-') {
            return redirect(route('createdata'))->with('error','Silahkan pilih tipe sertifikat terlebih dahulu !!');
        }

        $validatedData['path'] = $request->file('path')->store('fileImage');
        File::create($validatedData);

        return redirect(route('admdashboard'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Request $request)
    {

        if($request->path){
            Storage::delete($request->path);
        }
        $file = File::where('id',$request->target);
        $file->delete();

        return redirect(route('admdashboard'))->with('success','Data Berhasil Dihapus');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new FileImport, $file);
        return redirect(route('admdashboard'))->with('success','Data Berhasil Ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $file = File::findOrFail($id);


        $validatedData = $request->validate([
            'identity_number' => 'required',
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'barcode' => 'required',
            'type' => 'required',
            'event' => 'required',
            'path' => 'image|file|max:2048'
        ]);

        if($request->type === '-') {
            return redirect(route('createdata'))->with('error','Silahkan pilih tipe sertifikat terlebih dahulu !!');
        }
        if($request->file('path')) {
            if($request->target){
                Storage::delete($request->target);
            }
            $validatedData['path'] = $request->file('path')->store('fileImage');
        }
        $file->update($validatedData);

        return redirect(route('admdashboard'))->with('success','Data Berhasil Diedit');
    }
}
