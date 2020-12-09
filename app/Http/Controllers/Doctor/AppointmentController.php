<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Prescription;
use App\Models\Surgery;
use App\Notifications\bookingstate;
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
    public function getappointment(Request $request)
    {
        $app=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id);
        if ($request->patient) {
         $app->where('patient_id',$request->patient);
        }
        $appointments=$app->get();
        return response($appointments);
    }

    public function changestate(Request $request)
    {
      $appointment=Appointment::where('id',$request->id)->first();
      $appointment->state=$request->state;
      $appointment->save();
      if($request->state=='cancel')
      {
        $appointmenttime=AppointmentTime::where('day',$appointment->day)->where('time',$appointment->time)->where('clinic_id',$appointment->clinic_id)->first();
        if ($appointmenttime) {
            $appointmenttime->booked=0;
            $appointmenttime->save();
        }
        $appointment->patient->user->notify(new bookingstate($appointment));
        $appointment->delete();
      }else
      {
        $appointment->patient->user->notify(new bookingstate($appointment));
      }
      return response('Change State '.$request->state);
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
        $surgeries=Surgery::where('clinic_id',auth()->user()->doctor->clinic->id)->where('patient_id',$appointment->patient->id)->get();
        $prescriptions=Prescription::where('clinic_id',auth()->user()->doctor->clinic->id)->where('patient_id',$appointment->patient->id)->get();
        return view('doctor.main.appointment',compact('appointment','surgeries','prescriptions'));
       }
        return abort('404');
    }


}
