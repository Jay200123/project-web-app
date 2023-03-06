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

        $logs = Log::all();
        return view('log.index', compact($logs)); 
    }

    public function timeIn(){
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
        $logs->timeOut = "00:00";

        $logs->save();

        return redirect()->route('officer.profile');
    }

    public function edit($id){

            $logs = LogBook::find($id);
            return view('log.edit', compact('logs'));

    }
}
