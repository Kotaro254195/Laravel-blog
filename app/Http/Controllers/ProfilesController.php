<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{
    public function index(){
        return view('admin.users.profile')->with('user',Auth::user());
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'facebook'=>'required|url',
            'about'=>'required'
        ]);

        $user=Auth::user();

        if($request->hasFile("avatar")){
            $avatar=$request->avatar;
            $avatar_new_name=time().$avatar->getClientOriginalName();
            $avatar->move("uploads/avatars",$avatar_new_name);
            $user->profile->avatar ="uploads/avatars/".$avatar_new_name;
            $user->profile->save();
        }

        //dd($request->all());

        $user->name=$request->name;
        $user->email=$request->email;
        $user->profile->about=$request->about;
        $user->profile->facebook=$request->facebook;
        
        $user->save();
        $user->profile->save();

        if($request->has('password')){
            $user->password=bcrypt($request->password);
            $user->save();
        }

        Session::flash('success','Account profile updated.');

        return redirect()->back();
    }
}
