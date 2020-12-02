<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Favourites;
use App\Models\Surgery;
use App\Models\Prescription;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
       return view('patient.main.dashboard');
    }

    public function favourites()
    {
       $favourites=Favourites::where('patient_id',auth()->user()->patient->id)->pluck('clinic_id');
       $clinics=Clinic::whereIn('id',$favourites)->pluck('doctor_id');
       $doctors=Doctor::whereIn('id',$clinics)->get();
       return view('patient.main.favourites',compact('doctors'));
    }
    public function prescriptions()
    {
        $prescriptions=Prescription::where('patient_id',auth()->user()->patient->id)->get();
       return view('patient.main.prescriptions',compact('prescriptions'));
    }
    public function surgeries()
    {
       $surgeries=Surgery::where('patient_id',auth()->user()->patient->id)->get();
       return view('patient.main.surgeries',compact('surgeries'));
    }


}
