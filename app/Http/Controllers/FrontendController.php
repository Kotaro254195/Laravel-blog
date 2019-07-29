<?php

namespace App\Http\Controllers;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Support\Facedes\Session;
use Newsletter;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        
        return view("index")->with("settings",Settings::first())
                            ->with("categories",Category::all())
                            ->with("first_post",Post::orderBy("created_at","desc")->first())
                            ->with("second_post",Post::orderBy("created_at","desc")->skip(1)->take(1)->get()->first())
                            ->with("third_post",Post::orderBy("created_at","desc")->skip(2)->take(1)->get()->first())
                            ->with("laravel",Category::find(1))
                            ->with("php",Category::find(2));
    }

    public function single($slug){
        $post=Post::where("slug",$slug)->first();

        $next_id=POST::where("id",">","$post->id")->min("id");
        $prev_id=POST::where("id","<","$post->id")->max("id");

        return view("single")->with("post",$post)
                            ->with("next",Post::find($next_id))
                            ->with("prev",Post::find($prev_id))
                            ->with("tags",Tag::all())
                            ->with("settings",Settings::first())
                            ->with("categories",Category::all());
    }

    public function category($id){
        $category=Category::find($id);
        return view("category")->with("category",$category)
                                ->with("tags",Tag::all())
                                ->with("settings",Settings::first())
                                ->with("categories",Category::all());
    }

    public function tag($id){

        $tag=Tag::find($id);
        return view("tag")->with("tag",$tag)
                            ->with("settings",Settings::first())
                            ->with("categories",Category::all());
    }
    
    public function search(){
        $posts=Post::where("title","like",'%'.request("query").'%')->get();

        return view("results")->with("posts",$posts)
                                ->with("title","Search results: ".request("query"))
                                ->with("settings",Settings::first())
                                ->with("categories",Category::take(5)->get())
                                ->with("query",request("query"));
    }

    public function subscribe(){
        $email=request("email");

        Newsletter::subscribe($email);

        Session::flash("subscribe","Successfully subscribed");
        return redirect("/");
    }
}
