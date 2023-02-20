<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Events\SendMail;
use Auth;
use DB;
use Event;

class RegisterController extends Controller
{
    public function getStudentSignup(){

        // gets the student sign up form
        return view('user.student_signup');

    }

    public function getOfficerSignup(){

        // gets the officer sign up form
        return view('user.officer_signup');
        
    }

    public function postStudent(Request $request){

        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
        ]);

        $user = new User([
            'name' => $request->input('fname').''.$request->lname,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role').''.$request->role='unregistered'
        ]);

        $user->save();

        $request->validate([
            'title' => 'required|max:255',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'section' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'city' => 'required|max:255',
            'student_image' => 'required|mimes:png, jpg, gif, svg'
        ]);

        $student = new Student();

        $student->user_id = $user->id;
        $student->title = $request->title;
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->section = $request->section;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->town = $request->town;
        $student->city = $request->city;

        if($file=$request->hasFile('student_image')){
            $file = $request->file('student_image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $input['student_image'] = 'images/'.$fileName;
            $file->move($destinationPath, $fileName);
            $image = $input['student_image'] = 'images/'.$fileName;
            $student->student_image = $image;
        }

        $student->save();
        Event::dispatch(new SendMail($user));
        Auth::login($user);
        return redirect()->route('student.profile')->with('Successfully Registered!');
    }

    public function studentProfile(){

        $student = Student::where('user_id', Auth::id())->get();
        return view('profiles.students', compact('student'));

    }

    public function officerProfile(){
        
        $officer = Student::where('user_id', Auth::id())->get();
        return view('profiles.officer', compact('officer'));
    }
}
