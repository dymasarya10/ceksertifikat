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
}
