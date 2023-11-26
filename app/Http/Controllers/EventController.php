<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.pages.events.events',[
            'header' => 'Data Event',
            'collection' => Event::latest()->filter(request(['s']))->orderBy('name')->paginate(10)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.pages.events.create',[
            'header'=> 'Data Event',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|numeric|unique:events,id',
            'name' => 'required',
            'event_leader' => 'required',
            'event_comissioner' => 'required',
            'date' => 'required',
        ]);

        Event::create($validatedData);

        return redirect()->route('event')->with('success','Data Event Berhasil Ditambahkan');
    }

    public function destroy(Request $request)
    {
        $event = Event::find($request->target);
        $event->delete();

        return redirect(route('event'))->with('success','Data Event Berhasil Dihapus');
    }

    public function edit(Event $event)
    {
        return view('admin.pages.events.edit',[
            'header'=> 'Data Event',
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $cek = Event::find($id);
        ($request->id === $cek->id) ? $validation = '|unique:events,id' : $validation = '';

        $validateData = $request->validate([
            'id' => 'required|numeric'.$validation,
            'name' => 'required',
            'event_leader' => 'required',
            'event_comissioner' => 'required',
            'date' => 'required',
        ]);

        Event::findOrFail($id)->update($validateData);

        return redirect(route('event'))->with('success','Data Berhasil Diubah');
    }
}
