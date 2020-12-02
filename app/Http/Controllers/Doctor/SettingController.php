<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Step;
use App\Models\Doctor;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Services;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;

class SettingController extends Controller
{
    public function changepassword()
    {
       return view('doctor.setting.change-password');
    }
    public function postchange(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required|min:8',
            'new_password'=>'required|min:8|confirmed'
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        if (Hash::check($request->old_password,$user->password)) {
            $user->password=Hash::make($request->new_password);
            $user->save();
                 return redirect('/doctor/change-password')->with('success','تمت تغير كلمة المرور بنجاح');
        }
        else {
                return redirect('/doctor/change-password')->with('success','نريد كلمة المرور الحالية');
        }
    }
    public function setting()
    {
       return view('doctor.setting.setting');
    }

    public function abouteme()
    {
       $specialities=Speciality::all();
       if(auth()->user()->doctor)
        {
            return view('doctor.abouteme.edit',compact('specialities'));
        }
        else
        {
             return view('doctor.abouteme.create',compact('specialities'));
        }
    }
    public function store(Request $request)
    {
        $this->validate($request,[
        'abouteme'=>'required|min:100',
        'speciality_id'=>'required|numeric'
        ]);
      $doctor=new Doctor();
      $doctor->user_id=auth()->user()->id;
      $doctor->speciality_id=$request->speciality_id;
      $doctor->abouteme=$request->abouteme;
      $doctor->save();
      $doctor->social()->create();
      $user=User::find(auth()->user()->id)->first()->step()->update(['name'=>2]);
      return back()->with('success','Aboute Me Created');
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'abouteme'=>'required|min:100',
            'speciality_id'=>'required|numeric'
            ]);
        $doctor=Doctor::where('user_id',auth()->user()->id)->first();
        $doctor->speciality_id=$request->speciality_id;
        $doctor->abouteme=$request->abouteme;
        $doctor->save();
        return back()->with('success','Aboute Me updated');
    }
    public function basicinformation()
    {
       return view('doctor.setting.basic-information');
    }
    public function services()
    {
       return view('doctor.setting.services');
    }
    public function storeservices(Request $request)
    {
        $this->validate($request,[
            'service'=>'required',
        ]);
        $services=new Services();
        $services->doctor_id=auth()->user()->doctor->id;
        $services->name=$request->service;
        $services->save();
        return back()->with('success','Servcies updated');
    }
    public function deleteservices(Services $services)
    {
        $services->delete();
        return back()->with('success','Servcies Deleted');
    }
    public function education()
    {
        return view('doctor.setting.education');

    }
    public function storeeducation(Request $request)
    {
        $this->validate($request,[
            'from'=>'required',
            'to'=>'required',
            'degree'=>'required|min:4',
            'college'=>'required|min:4'
        ]);
        $education=new Education();
        $education->doctor_id=auth()->user()->doctor->id;
        $education->from=$request->from;
        $education->to=$request->to;
        $education->degree=$request->degree;
        $education->college=$request->college;
        $education->save();
        return back()->with('success','Education updated');
    }
    public function deleteeducation(Education $education)
    {
        $education->delete();
        return back()->with('success','Education Deleted');
    }

    public function experience()
    {
       return view('doctor.setting.experience');
    }
    public function storeexperience(Request $request)
    {
      $this->validate($request,[
          'from'=>'required',
          'to'=>'required',
          'hospital_name'=>'required|min:4',
      ]);
        $experience=new Experience();
        $experience->doctor_id=auth()->user()->doctor->id;
        $experience->from=$request->from;
        $experience->to=$request->to;
        $experience->hospital_name=$request->hospital_name;
        $experience->save();
        return back()->with('success','Experience updated');

    }
    public function deleteexperience(Experience $experience)
    {
        $experience->delete();
        return back()->with('success','Experience Deleted');
    }
    public function postbasicinformation(Request $request)
    {
      $this->validate($request,
      [
       'name'=>'required|min:4',
       'email'=>'email|required',
       'phone_number'=>'required|min:11|max:11',
       'image'=>'image|nullable',
       'gender'=>'required',
       'date_of_birth'=>'required|date'
      ]);
      $user=User::where('id',auth()->user()->id)->first();
      $user->name=$request->name;
      $user->email=$request->email;
      $user->gender=$request->gender;
      $user->date_of_birth=$request->date_of_birth;
      $user->phone_number=$request->phone_number;
      if($request->image)
      {
        $user->image=$request->image->store('storage/person');
      }
      $user->save();
      return back();
    }

}
