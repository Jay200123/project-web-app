<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\DataTables\StudentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Rules\ExcelRule;
use Excel;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::orderBy('student_id', 'ASC')->get();
        return view('student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // in register controller
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // in register controller
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::where('user_id', Auth::id())->find($id);
        // dd($students);
        return view('student.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $students = Student::find($id);

        $request->validate([
            'title' => 'required|max:255',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'section' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'city' => 'required|max:255',
            'student_image' => 'mimes:png,jpg,gif,svg'
        ]);

        $students->title = $request->title;
        $students->fname = $request->fname;
        $students->lname = $request->lname;
        $students->section = $request->section;
        $students->phone = $request->phone;
        $students->address = $request->address;
        $students->town = $request->town;
        $students->city = $request->city;

        if($file = $request->hasFile('student_image')){
            $file = $request->file('student_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath  = public_path().'/images';
            $input['student_image'] = 'images/'.$fileName;
            $image = $input['student_image'] = 'images/'.$fileName;
            $file->move($destinationPath, $fileName);
            $students->student_image = $image;
            }

            // dd($students);
            $students->update();
            return redirect()->route('student.profile')->with('success', 'Record Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //finds the student id 
        $student = Student::findOrFail($id);
        $student->delete(); //performs a delete function

        $Id = $student->user_id; //fetch the user id from the students table

        // passes the Id variable and uses it as a parameter for finding the id for user when deleting 
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('students.datatable')->with('success','Student Record Deleted Successfully');
    }

    public function getStudents(StudentDataTable $dataTable){

        $students = Student::where([])->get();
        return $dataTable->render('student.students');

    }

    public function import(Request $request){

        $request->validate(['student_import'  => ['required', new ExcelRule($request->file('student_import'))], ]);

        Excel::import(new StudentImport, request()->file('student_import'));

        return redirect()->back()->with('success', 'Excel File Imported Successfully');

    }
}
