<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\facades\Session;

class TagsController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
        return view("tags.index")->with("tags",$tags);
    }

    public function edit($id){
        $tag=Tag::findorFail($id);
        return view ("tags.create")->with("tag",$tag);
    }
    public function update(Tag $tag,Request $request){
        
        $tag->name=$request->name;
        $tag->save();
        Session::flash("success","Tag Updated Successflly");
        return redirect("/tags");
    }
    public function delete(Tag $tag){
        $tag->delete();
        Session::flash("success","Tag deleted Successflly");
        return redirect()->back();
    }
    public function create(Request $request){
        return view("tags.create");
    }
    public function store(Request $request){
        $tag=Tag::create([
            "name"=>$request->name
        ]);
        $tag->save();

        Session::flash("success","Tag Created Successflly");
        return redirect("/tags");
    }
}
