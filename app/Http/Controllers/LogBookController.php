<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogBook;
use App\Models\Student;
use App\Models\User;
use App\DataTables\LogDataTable;
use Yajra\DataTables\Facades\DataTables;
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

        $student = Student::where('user_id', Auth::id())->first();
        $logs->student_id = $student->student_id;
        $logs->position = $student->user->role;
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
       $student = Student::where('user_id', Auth::id())->first();

        //declare the variable $uid and set its value to user id 
        $uid = $student->student_id;

        //gets the user who is currently login through $uid and his default TimeOut value which is 00:00
        $logs = LogBook::where(['student_id' => $uid, 'timeOut' => "00:00"])->first();
        // dd($logs);

        $Id = $logs->log_id; //gets the log_id 

        $log = LogBook::findOrFail($Id);
        return view('log.edit', compact('log')); //returns to edit view and passes the $logs variable as a string

    }

    public function update(Request $request, $id){

        $logs = LogBook::findOrFail($id);

        //gets all the data from the edit form 
        $logs->log_date = $request->log_date;
        $logs->position = $request->position;
        $logs->timeIn = $request->timeIn;
        $logs->timeOut = $request->timeOut;

        $logs->update();
        return redirect()->route('officer.profile')->with('success','You Have Successfully Time Out!');

    }

    public function destroy($id){

        $logs = LogBook::findOrFail($id);
        $logs->delete();

        return redirect()->route('log.datatable')->with('success', 'LogBook Record Deleted Successfully');
    }

    public function getLogs(LogDataTable $dataTable){

        $logs = LogBook::with([])->get();
        return $dataTable->render('log.logbook');
    }
}
