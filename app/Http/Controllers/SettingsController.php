<?php

namespace App\Http\Controllers;
use App\Settings;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view("admin.settings")->with("settings",Settings::first());
    }

    public function update(Request $request){
        $this->validate(request(),[
            "site_name"=>"required",
            "author"=>"required",
            "author_bio"=>"required",
            "contact_number"=>"required",
            "contact_email"=>"required",
            "address"=>"required"
        ]);

        $settings=Settings::first();
        $settings->site_name=$request->site_name;
        $settings->author=$request->author;
        $settings->author_bio=$request->author_bio;
        $settings->contact_number=$request->contact_number;
        $settings->contact_email=$request->contact_email;
        $settings->address=$request->address;
        $settings->save();

        Session::flash("success","Settings Updated Successfully");
        return redirect("/settings");
    }
}
