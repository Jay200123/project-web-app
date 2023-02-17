<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    public function register(){
        try{
            DB::beginTransaction();

            $member = new Member();
            $member->user_id = $user->id;
            $member->date_placed = Carbon::now();
            $member->status='unpaid';

            }

            catch(\Exception $e){
                DB::rollback();
                return redirect()->route('student.signup')->with('error', $e->getMessage());
            }
        DB::commit();
    }
}
