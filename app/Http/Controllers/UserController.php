<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    public function index(){
        return view('welcome',['section' => 'welcome']);
    }

    public function login(){
        return view('welcome',['section' => 'login']);
    }

    public function register(){
        return view('welcome',['section' => 'register']);
    }
    

    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email', // same code to all //
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => 'required|confirmed|min:8',
        ]);
        $attributes['usertype'] = 'user';
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
        if(Auth()->user()->usertype == 'admin'){
            // return Auth()->user()->usertype;
                // return view('adminside',
        //     ['section' => 'adminlist',
        //     'message' => 'Admin Login Successfully',
        //     'appointments' => $appointments
        //     ]);

        return redirect('/admin/show');

        }else{
            return redirect('/')->with('message','Login Successfully');
        }
        // $id = (auth()->user()->id);
        // $count = Appointment::where('user_id',$id)->count();
        // auth()->user()->count = $count;
        // dd(auth()->user()->count);


        }
        throw ValidationException::withMessages([
            'email' => 'Invalid Credentials'
        ]);
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','Logout Successfully');
        // return redirect('/userlogin')->with('message','Logout Successfully');
    }
}
