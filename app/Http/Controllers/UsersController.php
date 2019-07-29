<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware("admin");
    }
    
    public function index(){
        return view("/admin.users.index")->with("users",User::all());
    }

    public function admin(User $user){
        $user->admin=1;
        $user->save();

        Session::flash("success","Settings Permission changed Successfully");
        return redirect("/users");
    }

    public function not_admin(User $user){
        $user->admin=0;
        $user->save();

        Session::flash("success","Settings Permission changed Successfully");
        return redirect("/users");
    }
    public function destroy(User $user){
        $user->delete();
        Session::flash("success","Users destroyed Successfully");
        return redirect("/users");
    }
    public function create(){
        return  view ("admin.users.create");
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:8'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads\avatars\1.png'
        ]);

        Session::flash("success","New Users Added Successfully");
        return redirect("/users");

    }
}
