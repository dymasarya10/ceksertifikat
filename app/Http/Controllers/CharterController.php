<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charter;

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
        $charter = Charter::where('serial_number',$request->target);
        $charter->delete();

        return redirect(route('charter'));
    }

    public function edit(Charter $charter)
    {
        return view('admin.pages.chartersedit',[
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
}
