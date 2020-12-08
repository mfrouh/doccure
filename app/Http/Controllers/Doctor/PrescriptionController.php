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
    public function getprescriptions(Request $request)
    {
        $app=Prescription::where('clinic_id',auth()->user()->doctor->clinic->id);
        if ($request->patient) {
         $app->where('patient_id',$request->patient);
        }
        $prescriptions=$app->get();
        return response($prescriptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment=Appointment::findOrfail($id);
        $appointment->prescription()->
        firstOrcreate([
            'clinic_id'=>$appointment->clinic_id,
            'patient_id'=>$appointment->patient_id,
        ]);
        $prescription=$appointment->prescription;
        return view('doctor.prescription.create',compact('prescription'));
    }

}
