<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.prescription.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment=Appointment::findOrfail($id);
        $prescription=Prescription::firstOrcreate([
            'clinic_id'=>$appointment->clinic_id,
            'patient_id'=>$appointment->patient_id,
            'appointment_id'=>$appointment->id,
        ]);
        return view('doctor.prescription.create',compact('prescription'));
    }

}
