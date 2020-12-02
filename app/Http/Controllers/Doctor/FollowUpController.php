<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'appointment_id'=>'required',
            'day'=>'required',
            'time'=>'required',
        ]);
        $followup =new FollowUp();
        $followup->appointment_id=$request->appointment_id;
        $followup->day=$request->day;
        $followup->time=$request->time;
        $followup->save();
        return back();
    }

    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();
        return back();
    }
}
