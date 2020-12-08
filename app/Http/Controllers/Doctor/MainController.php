<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\FollowUp;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Social;
use App\Models\Surgery;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
       $patientid=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->pluck('patient_id');
       $patients=Patient::whereIn('id',$patientid)->get();
       return view('doctor.main.dashboard',compact('patients'));
    }

    public function mypatients()
    {
       $patientid=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->pluck('patient_id');
       $patients=Patient::whereIn('id',$patientid)->get();
       return view('doctor.main.my-patients',compact('patients'));
    }
    public function patient($username)
    {
       $patientid=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->pluck('patient_id');
       $patient=Patient::whereHas('User',function($q)use ($username){
          $q->where('username',$username);
       })->whereIn('id',$patientid)->firstorfail();
       $appointments=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->where('patient_id',$patient->id)->get();
       $followups=FollowUp::whereIn('appointment_id',$appointments)->get();
       $surgeries=Surgery::where('clinic_id',auth()->user()->doctor->clinic->id)->where('patient_id',$patient->id)->get();
       $prescriptions=Prescription::where('clinic_id',auth()->user()->doctor->clinic->id)->where('patient_id',$patient->id)->get();
       return view('doctor.main.patient-profile',compact('patient','appointments','followups','surgeries','prescriptions'));
    }
    public function reviews()
    {
       return view('doctor.main.reviews');
    }
    public function socialmedia()
    {
       return view('doctor.main.social-media');
    }

    public function postsocialmedia(Request $request)
    {
       $social=Social::where('doctor_id',auth()->user()->doctor->id)->first();
       $social->facebook=$request->facebook;
       $social->instagram=$request->instagram;
       $social->youtube=$request->youtube;
       $social->twitter=$request->twitter;
       $social->save();
       return back();
    }

}
