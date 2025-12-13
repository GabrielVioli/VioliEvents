<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index() {

        $search = request('search');
        if($search) {
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }
        return view('events.showEvents', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('/events/createEvent');
    }


    public function store(Request $request) {
        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->private = $request->private;
        $event->items = $request->items;
        $event->date = $request->date;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = 'img/events/' . $imageName;
        } else {
            $event->image = "img/events/defaultImage.jpg";
        }

        $event->save();

        return redirect('/')->with('success', 'Evento criado com sucesso!');
    }

    public function show($id)  {
        $event = Event::findOrFail($id);

        return view('events.showEvent', ['event' => $event]);
    }
}
