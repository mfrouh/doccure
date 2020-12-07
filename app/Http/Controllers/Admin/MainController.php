<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Review;
use App\Models\Surgery;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $doctors=Doctor::all();
        $patients=Patient::all();
        $surgeries=Surgery::all();
        $appointments=Appointment::all();
       return view('admin.main.dashboard',compact('doctors','patients','surgeries','appointments'));
    }

    public function doctors()
    {
        $doctors=Doctor::all();
        return view('admin.main.doctors',compact('doctors'));
    }

    public function patients()
    {
        $patients=Patient::all();
        return view('admin.main.patients',compact('patients'));
    }

    public function appointments()
    {
        $appointments=Appointment::all();
        return view('admin.main.appointments',compact('appointments'));
    }
    public function reviews()
    {
        $reviews=Review::all();
        return view('admin.main.reviews',compact('reviews'));
    }
    public function surgeries()
    {
        $surgeries=Surgery::all();
        return view('admin.main.surgeries',compact('surgeries'));
    }
}
