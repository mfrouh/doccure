<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
       return view('admin.main.dashboard');
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
}
