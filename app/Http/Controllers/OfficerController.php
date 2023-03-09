<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class OfficerController extends Controller
{

    public function index(){
        $users = User::with('students')->where(['role' => 'officer'])->get();
    }
 
    public function edit($id){
        
        $officer = Student::findOrFail($id);
        return view('officer.edit', compact('officer'));
    }

    public function update(Request $request, $id){

        $officers = Student::findOrFail($id);

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

        $officers->title = $request->title;
        $officers->fname = $request->fname;
        $officers->lname = $request->lname;
        $officers->section = $request->section;
        $officers->phone = $request->phone;
        $officers->address = $request->address;
        $officers->town = $request->town;
        $officers->city = $request->city;

        if($file = $request->hasFile('student_image')){
            $file = $request->file('student_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath  = public_path().'/images';
            $input['student_image'] = 'images/'.$fileName;
            $image = $input['student_image'] = 'images/'.$fileName;
            $file->move($destinationPath, $fileName);
            $officers->student_image = $image;
            }

            // dd($students);
            $officers->update();
            return redirect()->route('officer.profile')->with('Record Successfully Updated');

    }
}
