<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use  App\Models\User;
use  App\Models\Task;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    //login page controller to dashboard
    public function login(Request $request)
{
    $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        // if user not exist-
    $UserExist = User::where('email', $credentials['email'])->exists();
    if(!$UserExist){
        return redirect('login')->with('error','User not register');
    }
    $tasks = Task::all();
    if(Auth::attempt($credentials)){
        return view('home',['tasks'=>$tasks]);
    }

    return redirect('login')->with('error','the email or password invaild.');
    
}



 // register page controller to login page
    public function register(Request $request)
    {
        // validation of inputs------
        $validateddata = $request->validate([
            "name"     => 'required|min:3',
            "email"    => 'required|email',
            "password" => 'required|min:6'
        ]);

        // User exists check 
        $UserExist = User::where('email', $validateddata['email'])->exists();

        if ($UserExist) {
            return redirect('login')->with('error','User Already Exists. Please Login.');
        }

        // saving into the database------
        $user = User::create([
            'name'     => $validateddata['name'],
            'email'    => $validateddata['email'],
            'password' => Hash::make($validateddata['password']),
        ]);

        // redirecting to login page--------
        return redirect('login')->with('success','User registered successfully! Please login.');
    }


    // to just sql query---------

    function show() {
        $bikes = DB::select('select * from bikes order by price ASC');

        return view('show',['bikes'=>$bikes]);
    }
}
