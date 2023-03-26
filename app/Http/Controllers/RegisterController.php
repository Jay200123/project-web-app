<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Order;
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

        // validate the email and password from the sign up form 
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
        ]);

    //  fetch the User Data from the signup form 
        $user = new User([
            'name' => $request->input('fname').''.$request->lname,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role').''.$request->role='unregistered'
        ]);

        $user->save(); //saves and insert the data fetch from form

        // for validating form when a user is signing up for mtics 
        $request->validate([
            'title' => 'required|max:255',
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'section' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'city' => 'required|max:255',
            'student_image' => 'required|mimes:png,jpg,jpeg,gif,svg'
        ]);

        $student = new Student();
        // fetch the data from the sign up form through http post request
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
        Event::dispatch(new SendMail($user)); //dispatch an email that the user has successfully registered
        Auth::login($user);
        return redirect()->route('student.profile')->with('Successfully Registered!');
    }

    public function studentProfile(){

        //fetch the data for student's info and passes it to the student views in profile folder
        $student = Student::where('user_id', Auth::id())->first();  
        $id = $student->student_id;
          
        $orders = Order::with('student','products')->where(['student_id' => $id])->get();
        // dd($orders);

        // dd($order);
        return view('profiles.students', compact('student','orders'));

    }

    public function officerProfile(){

        //fetch the data for officer's info and passes it to the officer views in profile folder
        $officer = Student::where('user_id', Auth::id())->first();    
        return view('profiles.officer', compact('officer'));
    }
}
