<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index() {
        $users = DB::table('users')
        ->where('role', 1)
        ->where('user_status', 'active')
        ->get();
        return view('admin.active-user', ['users' => $users]);
    }

     function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'department' => ['required'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->referrence_number = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
        $user->password = Hash::make($request->password);
        $user->department = $request->department;

        if($user->save()) {
            return redirect()->back()->with('user_added', 'User created');
        }
        else {
            // return redirect()->back()->with('email', 'Email exist');
            // return redirect()->with('error_added', 'The error message here!');
            return redirect()->route('active-user')->with('error_added', 'Email exist');
        }     

        
    
       
    }
}
