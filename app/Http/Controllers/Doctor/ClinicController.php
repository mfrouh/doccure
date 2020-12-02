<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->doctor->clinic)
        {
            return view('doctor.clinic.edit');
        }
        else{
            return view('doctor.clinic.create');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
        'country'=>'required',
        'state'=>'required',
        'address'=>'required',
        'city'=>'required',
        'open'=>'required',
        'close'=>'required',
        'time_appointment'=>'required',
        'price'=>'required',
        'days_work'=>'required|array',
        'type_booking'=>'required',
        ]);
        $clinic=new Clinic();
        $clinic->doctor_id=auth()->user()->doctor->id;
        $clinic->country=$request->country;
        $clinic->state=$request->state;
        $clinic->address=$request->address;
        $clinic->city=$request->city;
        $clinic->open=$request->open;
        $clinic->close=$request->close;
        $clinic->time_appointment=$request->time_appointment;
        $clinic->price=$request->price;
        $clinic->days_work=json_encode($request->days_work);
        $clinic->type_booking=$request->type_booking;
        $clinic->save();
        $this->AppointmentT($clinic);
        return back()->with('success','Clinic Created');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'country'=>'required',
            'state'=>'required',
            'address'=>'required',
            'city'=>'required',
            'open'=>'required',
            'close'=>'required',
            'time_appointment'=>'required',
            'price'=>'required',
            'days_work'=>'required|array',
            'type_booking'=>'required',
            ]);
            $clinic=Clinic::where('doctor_id',auth()->user()->doctor->id)->first();
            $clinic->doctor_id=auth()->user()->doctor->id;
            $clinic->country=$request->country;
            $clinic->state=$request->state;
            $clinic->address=$request->address;
            $clinic->city=$request->city;
            $clinic->open=$request->open;
            $clinic->close=$request->close;
            $clinic->time_appointment=$request->time_appointment;
            $clinic->price=$request->price;
            $clinic->days_work=json_encode($request->days_work);
            $clinic->type_booking=$request->type_booking;
            $clinic->save();
            return back()->with('success','Clinic Updated');
    }
    public static function AppointmentT($clinic)
    {
      for ($i=0; $i < $clinic->type_booking; $i++) {
        $open=Carbon::parse($clinic->open)->format('h:i:s');
        $close=Carbon::parse($clinic->close)->format('h:i:s');
        $j=0;
            do {
                $day=Carbon::now()->addDays($i);
                $open=Carbon::parse($clinic->open)->addMinutes($j*$clinic->time_appointment)->format('h:i:s');
                $close=Carbon::parse($clinic->close)->format('h:i:s');
                $appointment_time=new AppointmentTime();
                $appointment_time->clinic_id=$clinic->id;
                $appointment_time->day=$day;
                $appointment_time->time=$open;
                $appointment_time->save();
                $j++;
            } while ($close > $open);
      }
    }
    public function gallery(Request $request)
    {
          auth()->user()->doctor->clinic->gallery()->create(['url'=>$request->file->store('storage/clinic')]);
    }
    public function delete(Request $request)
    {
          auth()->user()->doctor->clinic->gallery()->delete();
    }

}
