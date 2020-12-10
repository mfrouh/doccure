<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Favourites;
use App\Models\Surgery;
use App\Models\Prescription;
use App\Models\Review;
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
    public function myfavourite(Request $request)
    {
        $favourite=Favourites::where('patient_id',auth()->user()->patient->id)->where('clinic_id',$request->clinic_id)->first();
        return response(1);
    }
    public function postfavourite(Request $request)
    {
        $this->validate($request,['clinic_id'=>'numeric|required']);
        $favourite=Favourites::where('patient_id',auth()->user()->patient->id)->where('clinic_id',$request->clinic_id)->first();
        if(!$favourite){
            $favourite=new favourites();
            $favourite->patient_id=auth()->user()->patient->id;
            $favourite->clinic_id=$request->clinic_id;
            $favourite->save();
            return response(1);
        }
        else
        {
             $favourite->delete();
             return response(0);
        }
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
    public function review(Request $request )
    {
        $this->validate($request,[
            'rate'=>'required_without:review',
            'review'=>'required_without:rate',
            'clinic_id'=>'required|numeric',
        ]);
        $review=review::where('patient_id',auth()->user()->patient->id)->where('clinic_id',$request->clinic_id)->first();
        if(!$review){
        $review=new Review();
        $review->rate=$request->rate;
        $review->review=$request->review;
        $review->clinic_id=$request->clinic_id;
        $review->patient_id=auth()->user()->patient->id;
        $review->save();
        return response('Review Created');
        }
        else
        {
        $review->rate=$request->rate;
        $review->review=$request->review;
        $review->save();
        return response('Review Updated');
        }
    }


}
