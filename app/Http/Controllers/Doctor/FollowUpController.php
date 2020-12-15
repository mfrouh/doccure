<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index()
    {
        $appointments=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id)->pluck('id');
        $followups=FollowUp::whereIn('appointment_id',$appointments)->get();
        return view('doctor.main.followups',compact('followups'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'appointment'=>'required',
            'day'=>'required',
            'time'=>'required',
        ]);
        $followup =new FollowUp();
        $followup->appointment_id=$request->appointment;
        $followup->day=$request->day;
        $followup->time=$request->time;
        $followup->price=$request->price;
        $followup->save();
        return response('FollowUp Created');
    }
    public function getfollowups(Request $request)
    {
        $app=Appointment::where('clinic_id',auth()->user()->doctor->clinic->id);
        if ($request->patient) {
         $app->where('patient_id',$request->patient);
        }
        if ($request->appointment) {
            $app->where('id',$request->appointment);
        }
        $appointments=$app->pluck('id');
        $followups=FollowUp::whereIn('appointment_id',$appointments)->get();
        return response($followups);
    }
    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();
        return response("Delete FollowUp");
    }
}
