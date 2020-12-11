<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function changepassword()
    {
       return view('admin.setting.change-password');
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
                 return redirect('/admin/change-password')->with('success','تمت تغير كلمة المرور بنجاح');
        }
        else {
                return redirect('/admin/change-password')->with('success','نريد كلمة المرور الحالية');
        }
    }

    public function setting()
    {
       return view('admin.setting.setting');
    }

    public function postsetting(Request $request)
    {
      $this->validate($request,
      [
       'name'=>'required|min:4',
       'email'=>'email|required',
       'phone_number'=>'required|min:11|max:11',
       'image'=>'image|nullable',
       'date_of_birth'=>'required|date'
      ]);
      $user=User::where('id',auth()->user()->id)->first();
      $user->name=$request->name;
      $user->email=$request->email;
      $user->phone_number=$request->phone_number;
      $user->gender=$request->gender;
      $user->date_of_birth=$request->date_of_birth;
      if($request->image)
      {
        $user->image=sorteimage('storage/person',$request->image);
      }
      $user->save();
      return back();

    }

}
