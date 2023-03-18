<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index(){
        
        // $users = User::with('students')->get();
        $users = User::where(['role'=>'student'])->get();
        return view('user.index', compact('users'));
    }

    public function getUsers(UserDataTable $dataTable){

        $users = User::with([])->get();
        return $dataTable->render('user.users');
        
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

        return redirect()->route('users.datatable')->with('success','User Role Updated Successfully');

    }

    public function delete($id){
        
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->routes('users.datatable')->with('success', 'Record Deleted Successfully');
    }

    public function changePassword(){

        return view('password.password');
    }

    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::where('id', Auth::id())->first()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with("status", "Password changed successfully!");
}
}
