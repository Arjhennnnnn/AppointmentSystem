<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;



class AppointmentController extends Controller
{
    public function store(Request $request){


        $attributes = $request->validate([
            'name' => 'required',
            'appointment_detail' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'status' => 'required'
        ]);
        // $attributes['user_id'] = auth()->user()->id;
        $date_end = $attributes['appointment_date'];
        $time_end = $attributes['appointment_time'];
        $date_start = Carbon::parse($date_end.$time_end);
        $date_end = Carbon::parse($date_end.$time_end);
        $date_end->addHours(2);

        // $attributes['appointment_start'] = $date_start->format('Y/m/d h:i A');
        // $attributes['appointment_end'] = $date_end->format('Y/m/d h:i A');

        Appointment::create([
            'user_id' => auth()->user()->id,
            'name' => $attributes['name'],
            'appointment_detail' => $attributes['appointment_detail'],
            'appointment_start' => $date_start->format('Y/m/d h:i A'),
            'appointment_end' => $date_end->format('Y/m/d h:i A'),
            'phone' => $attributes['phone'],
            'message' => $attributes['message'],
            'status' => $attributes['status']
        ]);
        return redirect('/')->with('message','Created Succesfully');

    }
        public function show(){
            $id = (auth()->user()->id);
            $appointments = Appointment::with('stats')
                            ->where('user_id',$id)
                            ->where('status','!=','5')
                            ->get();

            return view('user.app_list',
                ['section' => 'list',
                'appointments' => $appointments
            ]);
        }

        public function edit($id){
            $appointment = Appointment::find($id);
            return view('user.app_update',['appointment' => $appointment]);

        }

        public function update(Request $request,Appointment $id){
            $attributes = $request->validate([
                'name' => 'required',
                'appointment_detail' => 'required',
                'appointment_start' => 'requiread',
                'phone' => 'required',
                'message' => 'required',
            ]);
            $attributes['user_id'] = auth()->user()->id;
            $attributes['status'] = '1';

            $id->update($attributes);

            return redirect('appointment/show')->with('message','Updated Succesfully');

            // $attributes['user_id'] = auth()->user()->id;
            // $attributes['status'] = '1';
        }


        public function cancel(Appointment $id){
            $id->update([
                'status' => '5'
            ]);
            return redirect('appointment/show')->with('message','Cancel Successfully');
        }


}
