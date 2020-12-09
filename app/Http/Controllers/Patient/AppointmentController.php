<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Prescription;
use App\Models\Surgery;
use App\Models\User;
use App\Notifications\booking;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=Appointment::where('patient_id',auth()->user()->patient->id)->get();
        return view('patient.appointment.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($username)
    {
        $user=User::where('username',$username)->firstorfail();
        $doctor=Doctor::where('user_id',$user->id)->firstorfail();
        return view('patient.appointment.create',compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'clinic_id'=>'required',
        'day'=>'required',
        'time'=>'required',
        ]);
        $clinic=Clinic::find($request->clinic_id);
        $appointment =new Appointment();
        $appointment->clinic_id=$request->clinic_id;
        $appointment->patient_id=auth()->user()->patient->id;
        $appointment->day=$request->day;
        $appointment->time=$request->time;
        $appointment->price=$clinic->price;
        $appointment->booking_day=now();
        $appointment->booking_time=now();
        $appointment->state='pending';
        $appointment->save();
        $appointmenttime=AppointmentTime::where('day',$request->day)->where('time',$request->time)->where('clinic_id',$request->clinic_id)->first();
        $appointmenttime->booked=1;
        $appointmenttime->save();
        $user=User::find(auth()->user()->id);
        $clinic->doctor->user->notify(new booking($appointment));
        return response('booking success ');
    }
    public function show(Appointment $appointment)
    {
       if ($appointment->patient_id==auth()->user()->patient->id)
       {
        $surgeries=Surgery::where('patient_id',auth()->user()->patient->id)->where('clinic_id',$appointment->clinic->id)->get();
        $prescriptions=Prescription::where('patient_id',auth()->user()->patient->id)->where('clinic_id',$appointment->clinic->id)->get();
        return view('patient.appointment.show',compact('appointment','surgeries','prescriptions'));
       }
        return abort('404');
    }

    public function time(Request $request)
    {
        $times=AppointmentTime::where('clinic_id',$request->clinic)->where('day',$request->day)->get();
        return response($times);
    }
    public function day(Request $request)
    {
     $days=AppointmentTime::where('clinic_id',$request->clinic)->pluck('day');
     return response($days->unique());
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back();
    }
}
