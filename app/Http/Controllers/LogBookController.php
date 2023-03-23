<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogBook;
use App\Models\Student;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class LogBookController extends Controller
{
    public function index(){

        //fetch all the data from the database
        $logs = Log::all();
        return view('log.index', compact($logs)); 
    }

    public function timeIn(){

        // gets the form for time in in (log/create.blade.php)
        return view('log.create');
    }

    public function store(Request $request){


        $logs = New LogBook();

        $users = User::where('id', Auth::id())->first();
        $logs->user_id = $users->id;
        $logs->position = $users->role;
        $logs->log_date = Carbon::now();

        //fetch the data from the request form
        $logs->timeIn = $request->timeIn;
        //sets the time Out default value to zero
        $logs->timeOut = "00:00";

        $logs->save();

        return redirect()->route('officer.profile')->with('success', 'You Have Successfully Time In!');
    }

    public function edit($id){

        //fetch the User who has currently login and gets its id
        $user = User::where('id', Auth::id())->first();

        //declare the variable $uid and set its value to user id 
        $uid = $user->id;

        //gets the user who is currently login through $uid and his default TimeOut value which is 00:00
        $logs = LogBook::where(['user_id' => $uid, 'timeOut' => "00:00"])
        ->whereDate('created_at', now()->format('Y-m-d'))
        ->first();
       
        return view('log.edit', compact('logs')); //returns to edit view and passes the $logs variable as a string

    }

    public function update(Request $request ){

          //fetch the User who has currently login and gets its id
        $user = User::where('id', Auth::id())->first();
        $uid = $user->id;

        //uses the $uid for finding the specific row to perform update function
        $logs = LogBook::where(['user_id' => $uid])->first();

        //gets all the data from the edit form 
        $logs->log_date = $request->log_date;
        $logs->position = $request->position;
        $logs->timeIn = $request->timeIn;
        $logs->timeOut = $request->timeOut;

        $logs->update();
        return redirect()->route('officer.profile')->with('success','You Have Successfully Time Out!');

    }
}
