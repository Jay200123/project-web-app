<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    public function getSignIn(){
        return view('user.signin');
    }
        
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
     if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
        {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('dashboard.index');
            } else if (auth()->user()->role === 'officer'|| auth()->user()->role ==='president'){
             return redirect()->route('officer.profile');
            }
            
            else if(auth()->user()->role === 'student'){
                return redirect()->route('events.page');
            }
            else{
                return redirect()->route('student.profile');
            }
        }
        else{
            return redirect()->route('user.signin')->with('error','Email-Address And Password Are Wrong.');
        }
     }

    public function logout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }
}
