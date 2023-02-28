<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogBook;
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

        // fetch the users id and role in the database
        $user = User::where('id',Auth::id())->first();

        // dd($user);
        $logs->user_id = $user->id;
        $logs->position = $user->role;
        $logs->log_date = Carbon::now();

        //fetch the data from the request form
        $logs->timeIn = $request->timeIn;
        $logs->timeOut = "00:00";

        $logs->save();

        return redirect()->route('officer.profile');
    }
}
