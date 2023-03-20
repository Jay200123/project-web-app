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

        return redirect()->route('officer.profile')->with('success', 'You Have Successfully Time In!');
    }

    public function edit($id){

        $user = User::where('id', Auth::id())->first();
        $uid = $user->id;

        $logs = LogBook::where(['user_id' => $uid, 'log_date' => now()->format('Y-m-d')])
        ->orderBy('created_at', 'desc')
        ->first();

        // dd($logs);
        // $logs = LogBook::where(['user_id' => $uid, 'log_date' => now()])->first();
        // dd($logs);
        return view('log.edit', compact('logs'));

    }

    public function update(Request $request ){

        $user = User::where('id', Auth::id())->first();
        $uid = $user->id;

        $logs = LogBook::where(['user_id' => $uid])->first();

        $logs->log_date = $request->log_date;
        $logs->position = $request->position;
        $logs->timeIn = $request->timeIn;
        $logs->timeOut = $request->timeOut;

        $logs->update();

        return redirect()->route('officer.profile')->with('success','You Have Successfully Time Out!');

    }
}
