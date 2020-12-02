<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Social;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
       return view('doctor.main.dashboard');
    }

    public function mypatients()
    {
       $patientid=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->pluck('patient_id');
       $patients=Patient::whereIn('id',$patientid)->paginate(12);
       return view('doctor.main.my-patients',compact('patients'));
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
