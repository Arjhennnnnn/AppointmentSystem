<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function approve(Appointment $id){
        $id->update([
            'status' => '2'
        ]);
        return back()->with('message','Approve Successfully');
    }


    public function show(){
        $current = Carbon::now();
        $date_now = $current->format('Y/m/d h:i A');
        $appointments = Appointment::with('stats')->where('status',2)->where('appointment_end','>',$date_now)->get();
        return view('admin.adminside',
        ['section' => 'adminlist',
        'message' => 'Admin Login Successfully',
        'appointments' => $appointments
        ]);
    }
    
    public function history(){
        
        $current = Carbon::now();
        $date_now = $current->format('Y/m/d h:i A');
    
        $appointments = Appointment::with('stats')->where('appointment_end','<',$date_now)->get();
        return view('admin.adminhistory',
        ['section' => 'adminlist',
        'message' => 'Admin Login Successfully',
        'appointments' => $appointments
        ]);
    }
}
