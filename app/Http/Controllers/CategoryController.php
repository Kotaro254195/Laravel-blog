<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy("name","DESC")->get();
        return view("category.index")->with("categories",$categories);
    }
    public function edit($id){
        $category=Category::findorFail($id);
        return view ("category.create")->with("category",$category);
    }
    public function update(Category $category,Request $request){
        
        $category->name=$request->name;
        $category->save();
        Session::flash("success","Category Updated Successflly");
        return redirect("/categories");
    }
    public function delete(Category $category){
        $category->delete();
        Session::flash("success","Category deleted Successflly");
        return redirect()->back();
    }
    public function create(Request $request){
        return view("category.create");
    }
    public function store(Request $request){
        $category=Category::create([
            "name"=>$request->name
        ]);
        $category->save();

        Session::flash("success","Category Created Successflly");
        return redirect("/categories");
    }
}