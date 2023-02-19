<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        
        $users = User::with('students')->get();
        // dd($users);
        return view('user.index', compact('users'));
    }

    public function editRole($id){

        $user = User::findOrFail($id);
        return view('user.edit_role', compact('user'));
        
    }

    public function updateRole(Request $request, $id){

        $user = User::with('students')->findOrFail($id);

        $request->validate([
          'role' => 'required|max:255'
        ]);

        $user->role = $request->role;

        $user->update();

        return redirect()->route('user.index')->with('User Role Updated Successfully');

    }
}
