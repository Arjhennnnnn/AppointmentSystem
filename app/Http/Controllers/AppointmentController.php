<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;



class AppointmentController extends Controller
{
    public function store(Request $request){
        // dd($request);


        $attributes = $request->validate([
            'name' => 'required',
            'appointment_detail' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'status' => 'required'
        ]);
        $attributes['user_id'] = auth()->user()->id;


        $attributestime =  $attributes['appointment_time'];
        $formattedTime = Carbon::parse($attributestime)->format('h:i A');
        $attributes['appointment_time'] = $formattedTime;
        Appointment::create($attributes);
        return redirect('/')->with('message','Created Succesfully');

    }
        public function show(){
            $id = (auth()->user()->id);
            $appointments = Appointment::with('stats')->where('user_id',$id)->get();
            return view('appointmentlist',
                ['section' => 'list',
                'appointments' => $appointments
            ]);
        }

}
