<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Student;
use App\Models\User;
use App\Models\Status;
use App\DataTables\MemberDataTable;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Auth;
use DomPDF;
use Session;
use Redirect;
use Carbon\Carbon;

class TransactionsController extends Controller
{
    
    public function index(){

        $members = Member::with("student")->get();
        // foreach($members as $member);
        // $member->student->fname;
        // dd($member);
        return view('member.index', compact('members'));
    }

    public function getMembers(MemberDataTable $dataTable){

        $members = Member::with(['student', 'stats'])->get();
        return $dataTable->render('member.members');

    }

    public function getForms(){
        return view('member.form');
    }
    
    public function register(Request $request){

        try{
            DB::beginTransaction();

            $member = new Member();
            
            $student = Student::where('user_id',Auth::id())->first();
            // dd($student->student_id);
            $member->student_id = $student->student_id;
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
        return redirect()->route('student.profile')->with('success', 'Membership transaction successful!');
    }

    public function editMember($id){
        
        $member = Member::with('student','stats')->findOrFail($id);
        // dd($members);
        return view('member.edit', compact('member'));

    }

    public function updateMember(Request $request, $id){

        
        $member = Member::with('student','stats')->findOrFail($id);
        $member->status = 'paid'; //changes the status to paid
        $Id = $member->student_id; //fetch the student id from membership table
    
        // dd($Id);
        $member->update();

        //gets the student id from the membership table
        $students = Student::findOrFail($Id);

        $u_id = $students->user_id; //fetch the user id from the students table

        $users = User::findOrFail($u_id); //gets the user id 
        $users->role="student"; //update the user role

        $users->update(); 
        
        $stats = Status::findOrFail($id); //gets the info_id from the membership table
        $stats->date_paid = Carbon::now(); //updates the paid 

        $stats->update();

        $data = [
            'title' => 'MTICS Reciept',
            'member_id' =>  $member->info_id,
            'date_placed' => $member->date_placed,
            'date_paid' => now(),
            'fname' => $member->student->fname,
            'lname' => $member->student->lname,
            'section' => $member->student->section,
            'amount' => $member->stats->amount,
        ];

        $pdf = DomPDF::loadView('member.reciept', $data)->setOptions(['defaultFont' => 'sans-serif']);

        Session::flash('success', 'Membership Successfully Updated');

        return $pdf->download('mtics_reciept.pdf');

    }

    public function deletemembers($id){
        
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.datatable')->with('success', 'Record Successfully Deleted');
    }

    public function getpdf(){
        return view('member.reciept');
    }

    
}
