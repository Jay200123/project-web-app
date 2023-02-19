<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Student;
use App\Models\User;
use App\Models\Status;
use DB;
use Auth;
use Carbon\Carbon;

class TransactionsController extends Controller
{

    public function getForms(){
        return view('member.form');
    }
    public function register(Request $request){

        try{
            DB::beginTransaction();

            $member = new Member();
            
            // $student = Student::where('user_id', Auth::id())->first();
            $user = User::where('id',Auth::id())->first();

            $member->user_id = $user->id;
            $member->date_placed = Carbon::now();
            $member->status='unpaid';
            $member->save();

            $status = new Status();

            $status->info_id = $member->info_id;
            $status->date_paid = Carbon::now()->addDays(3);
            $status->amount = $request->amount;
            $status->save();
            // $status->
            }
            catch(\Exception $e){
                dd($e);
                DB::rollback();
                return redirect()->route('member.forms')->with('error', $e->getMessage());
            }
        DB::commit();
        return redirect()->route('student.profile')->with('Success', 'Successfully Registered!');
    }
}