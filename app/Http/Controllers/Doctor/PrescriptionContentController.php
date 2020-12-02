<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\PrescriptionContent;
use Illuminate\Http\Request;

class PrescriptionContentController extends Controller
{
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
            'days'=>'required',
            'time'=>'required',
            'quantity'=>'required',
            'prescription_id'=>'required',
        ]);
        $prescriptioncontent=new PrescriptionContent();
        $prescriptioncontent->prescription_id=$request->prescription_id;
        $prescriptioncontent->name=$request->name;
        $prescriptioncontent->days=$request->days;
        $prescriptioncontent->time=$request->time;
        $prescriptioncontent->quantity=$request->quantity;
        $prescriptioncontent->save();
        return back()->with('Prescription Created');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrescriptionContent $prescriptioncontent)
    {
        $this->validate($request,[
            'name'=>'required',
            'days'=>'required',
            'time'=>'required',
            'quantity'=>'required',
            'prescription_id'=>'required',
        ]);
        $prescriptioncontent->prescription_id=$request->prescription_id;
        $prescriptioncontent->name=$request->name;
        $prescriptioncontent->days=$request->days;
        $prescriptioncontent->time=$request->time;
        $prescriptioncontent->quantity=$request->quantity;
        $prescriptioncontent->save();
        return back()->with('Prescription Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrescriptionContent $prescriptioncontent)
    {
        $prescriptioncontent->delete();
        return back()->with('success','Delete Prescription');
    }
}
