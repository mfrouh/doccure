<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Jobs\AppointmentTime as JobsAppointmentTime;
use App\Models\AppointmentTime;
use App\Models\Clinic;
use App\Models\Image;
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
        $this->dispatch(new JobsAppointmentTime($clinic));
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
            $appointment_time=AppointmentTime::where('clinic_id',$clinic->id)->where('booked',0)->delete();
            $this->dispatch(new JobsAppointmentTime($clinic));
            return back()->with('success','Clinic Updated');
    }

    public function gallery(Request $request)
    {
          auth()->user()->doctor->clinic->gallery()->create(['url'=>sorteimage('storage/clinic',$request->file)]);
          return response('Uploaded');
    }
    public function delete(Request $request)
    {
          $image=Image::findorfail($request->id);
          $image->delete();
          return response('Deleted');
    }
    public function all()
    {
          return response(auth()->user()->doctor->clinic->gallery);
    }

}
