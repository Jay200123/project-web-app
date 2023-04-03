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
        
        // fetch all the data from the events table 
        $events = Events::All();
        return view('announcements.index',compact('events'));

    }

    public function create(){
        // redirect to create views for events 
        return view('announcements.create');
    }

    public function show($id){

        $event = Events::findOrFail($id);
        return view('announcements.show', compact('event'));
    }

    public function store(Request $request){

        //fetch and store the data from the create form through post http request
        $event = new Events();

        $event->title = $request->title;
        $event->date_placed = Carbon::now();
        $event->date_occured = $request->date_occured;

        //for storing the  event image file 
        if($file=$request->hasFile('event_image')){
            $file = $request->file('event_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $input['event_image'] = 'images/'.$fileName;
            $file->move($destinationPath, $fileName);
            $image = $input['event_image'] = 'images/'.$fileName;
            $event->event_image = $image;
        }

        //saves and insert the data
        $event->save();

        return redirect()->back()->with('Event Created Successfully');

    }

    public function destroy($id)
    {

        // find the  id and perform a delete function
        Events::find($id)->delete();

        return redirect()->route('getEvents')->with('success','Event Successfully Removed');
    }

    public function getEvents(EventsDataTable $dataTable){

        $events = Events::with([])->get();
        return $dataTable->render('announcements.event');

    }
}
