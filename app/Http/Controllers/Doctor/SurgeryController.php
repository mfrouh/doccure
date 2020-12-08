<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Surgery;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('doctor.surgery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.surgery.create');
    }
    public function getsurgeries(Request $request)
    {
        $app=Surgery::where('clinic_id',auth()->user()->doctor->clinic->id);
        if ($request->patient) {
         $app->where('patient_id',$request->patient);
        }
        $surgeries=$app->get();
        return response($surgeries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'day'=>'required|date',
            'time'=>'required',
            'price'=>'required|numeric',
            'hospital_name'=>'required',
        ]);
        $surgery=new Surgery();
        $surgery->name=$request->name;
        $surgery->day=$request->day;
        $surgery->time=$request->time;
        $surgery->price=$request->price;
        $surgery->hospital_name=$request->hospital_name;
        $surgery->save();
        return back()->with('success','Create Surgery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function show(Surgery $surgery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function edit(Surgery $surgery)
    {
        return view('doctor.surgery.index',compact('surgery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surgery $surgery)
    {
        $this->validate($request,[
            'name'=>'required',
            'day'=>'required|date',
            'time'=>'required',
            'price'=>'required|numeric',
            'hospital_name'=>'required',
        ]);
        $surgery->name=$request->name;
        $surgery->day=$request->day;
        $surgery->time=$request->time;
        $surgery->price=$request->price;
        $surgery->hospital_name=$request->hospital_name;
        $surgery->save();
        return back()->with('success','Update Surgery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surgery  $surgery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surgery $surgery)
    {
        $surgery->delete();
        return back()->with('success','Delete Surgery');
    }
}
