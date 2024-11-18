<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function submitRegistration(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        return redirect()->route('login')->with('success', 'Registration Successful!');
    }

    public function login(){
        return view('login');
    }

    public function submitLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data = $request->only('email' , 'password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', 'Login successful!');
        }else{
            return redirect()->back()->with('fail', 'Email or Password wrong!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
