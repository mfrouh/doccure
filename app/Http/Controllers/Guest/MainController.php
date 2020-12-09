<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       $specialities=Speciality::all();
       $clinics=Clinic::all();
       return view('guest.index',compact('specialities','clinics'));
    }

    public function doctorprofile($username)
    {
       $doctor=User::where('username',$username)->firstorfail()->doctor;
       return view('guest.doctor-profile',compact('doctor'));
    }

    public function patientprofile()
    {
       return view('guest.patient-profile');
    }
    public function search(Request $request)
    {
       $specialities=Speciality::all();
       $user=User::query();
       if ($request->name) {
        $user->where('name','like',"%$request->name%");
       }
       if ($request->gender) {
        $user->whereIn('gender',$request->gender);
       }
        $users=$user->pluck('id');
       $doctors=Doctor::whereIn('user_id',$users)->pluck('id');
       $clinics=Clinic::whereIn('doctor_id',$doctors)->get();
       return view('guest.search',compact('specialities','clinics'));
    }
    public function speciality($name)
    {
       $speciality=Speciality::where('name',$name)->firstOrfail();
       $doctor=Doctor::where('speciality_id',$speciality->id)->get('id');
       $clinics=Clinic::whereIn('doctor_id',$doctor)->get();
       return view('guest.speciality',compact('speciality','clinics'));
    }


}
