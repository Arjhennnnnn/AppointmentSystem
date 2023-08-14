<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email', // same code to all //
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:8',
        ]);

        User::create($attributes);
        return redirect('/register')->with('message','Register Succesfully');
    }


    public function process(Request $request){
        $validate = $request->validate([
            "email" => 'required',
            "password" => 'required',
        ]);
        if(auth()->attempt($validate)){
        $request->session()->regenerate();
        // $id = (auth()->user()->id);
        // $count = Appointment::where('user_id',$id)->count();
        // auth()->user()->count = $count;
        // dd(auth()->user()->count);
        return redirect('/');

        }
        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        // return redirect('/userlogin')->with('message','Logout Successfully');
    }
}
