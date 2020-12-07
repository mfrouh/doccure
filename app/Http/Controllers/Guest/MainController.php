<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       return view('guest.index');
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
    public function search()
    {
       return view('guest.search');
    }

}
