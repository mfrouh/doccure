<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
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
        $user=User::where('username',$username)->pluck('id');
        $doctor=Doctor::where('user_id',$user)->firstorfail();
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
        'patient_id'=>'required',
        'day'=>'required',
        'time'=>'required',
        ]);
        $appointment =new Appointment();
        $appointment->clinic_id=$request->clinic_id;
        $appointment->patient_id=$request->patient_id;
        $appointment->day=$request->day;
        $appointment->time=$request->time;
        $appointment->booking_day=now();
        $appointment->booking_time=now();
        $appointment->follow_up=$request->follow_up;
        $appointment->state='pending';
        $appointment->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('patient.appointment.edit',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request,[
            'clinic_id'=>'required',
            'patient_id'=>'required',
            'day'=>'required',
            'time'=>'required',
            ]);
            $appointment->clinic_id=$request->clinic_id;
            $appointment->patient_id=$request->patient_id;
            $appointment->day=$request->day;
            $appointment->time=$request->time;
            $appointment->booking_day=now();
            $appointment->booking_time=now();
            $appointment->follow_up=$request->follow_up;
            $appointment->state='pending';
            $appointment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back();
    }
}
