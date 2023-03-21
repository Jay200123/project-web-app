<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\EventsDataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Events;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index(){
        $events = Events::All();
        return view('announcements.index',compact('events'));

    }

    public function create(){
        return view('announcements.create');
    }

    public function store(Request $request){

        $event = new Events();

        $event->title = $request->title;
        $event->date_placed = Carbon::now();
        $event->date_occured = $request->date_occured;

        if($file=$request->hasFile('event_image')){
            $file = $request->file('event_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $input['event_image'] = 'images/'.$fileName;
            $file->move($destinationPath, $fileName);
            $image = $input['event_image'] = 'images/'.$fileName;
            $event->event_image = $image;
        }

        $event->save();

        return redirect()->back()->with('Event Created Successfully');

    }

    public function destroy($id)
    {
        Events::find($id)->delete();

        return redirect()->route('announcements.index')->with('Item Successfully Removed');
    }

    public function getEvents(EventsDataTable $dataTable){

        $events = Events::with([])->get();
        return $dataTable->render('announcements.event');

    }
}
