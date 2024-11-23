<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function index(){
        return view('registeration');
    }
    public function register(Request $request){
            $data=$request->validate([
                'name'=>'required|max:255',
                'email'=>'required|email|unique:users',
                'password'=>'required|confirmed|string:min:5',
                'role'=>'required',
            ]);
         $user=new Users();
         $user->name=$data['name'];
         $user->email=$data['email'];
         $user->password=Hash::make($data['password']);
      
         $user->role=$data['role'];
         $user->save();
         return redirect()->route('login')->with('success', 'Registration successful! Welcome!');
    }
    public function login(){
        return view('login');
    }
    
    public function loginMatch(Request $request){
        $credential=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string:min:5',
        ]);
        if(Auth::attempt($credential)){
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }
        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }
    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
    }
    // public function InnerPage(){
    //     if(Auth::check()){
    //         return view('inner');
    //     }
    //     else{
    //         redirect()->route('login');
    //     }
    // }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
