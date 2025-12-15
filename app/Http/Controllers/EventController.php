<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('success', 'Evento criado com sucesso!');
    }

    public function show($id)  {
        $event = Event::findOrFail($id);
        $user = User::findOrFail($event->user_id);

        return view('events.showEvent', ['event' => $event, 'user' => $user]);
    }

    public function dashboard() {
        $user = auth()->user();
        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('success', 'Evento removido com sucesso!');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);

        if(auth()->user()->id != $event->user_id) {
            return redirect('/dashboard');
        }

        return view('events.editEvent', ['event' => $event]);
    }

    public function update(Request $request) {
        $data = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $data['image'] = 'img/events/' . $imageName;
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function join($id)
    {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $user->eventsAsMembers()->attach($id);

        return redirect('/dashboard')->with('success', 'Sua presença está confirmada no evento '. $event->title);

    }
}

