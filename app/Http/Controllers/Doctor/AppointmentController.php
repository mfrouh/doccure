<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
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
        $appointments=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->get();
        return view('doctor.main.appointments',compact('appointments'));
    }

    public function changestate(Request $request)
    {
      $appointment=Appointment::where('id',$request->id)->first();
      $appointment->state=$request->state;
      $appointment->save();
      return back()->with('success','Change Appointment State');
    }
    public function diagnose(Request $request)
    {
      $appointment=Appointment::where('id',$request->appointment)->firstorfail();
      $appointment->attend=1;
      $appointment->diagnose=$request->diagnose;
      $appointment->save();
      return response('Appointment Diagnose Save');
    }
    public function show(Appointment $appointment)
    {
       if ($appointment->clinic_id==auth()->user()->doctor->clinic->id)
       {
        return view('doctor.main.appointment',compact('appointment'));
       }
        return abort('404');
    }


}
