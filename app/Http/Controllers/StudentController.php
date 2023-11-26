<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.pages.students.students', [
            'header' => 'Data Siswa',
            'collection' => Student::filter(request(['s']))->orderBy('name')->paginate(10)->withQueryString()
        ]);
    }

    public function destroy(Request $request)
    {
        $charter = Student::find($request->target);
        $charter->delete();

        return redirect(route('student'));
    }

    public function create()
    {
        return view('admin.pages.students.create', [
            'header' => 'Data Siswa'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|numeric|unique:students,id',
            'name' => 'required|regex:/^[A-Za-z\s]+$/'
        ]);

        Student::create($validateData);

        return redirect(route('student'))->with('success', 'Data Berhasil Ditambahkan');

    }

    public function edit(Student $student)
    {
        return view('admin.pages.students.edit', [
            'header' => 'Data Siswa',
            'student' => $student
        ]);
    }

    public function update(Request $request, $id)
    {
        $cek = Student::find($id);
        ($request->id === $cek->id) ? $validation = '|unique:events,id' : $validation = '';

        $validateData = $request->validate([
            'id' => 'required|numeric' . $validation,
            'name' => 'required|regex:/^[A-Za-z\s]+$/'
        ]);

        Student::findOrFail($id)->update($validateData);

        return redirect(route('student'))->with('success', 'Data Berhasil Diubah');
    }

    public function importexcel(Request $request)
    {
        $file = $request->file('file')->store('import');
        (new StudentImport)->import($file);
        return redirect(route('student'))->with('success', 'Data Berhasil Ditambahkan');
    }
}
