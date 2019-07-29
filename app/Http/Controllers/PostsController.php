<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @retun \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        // $categories=Category::find(request()->category_id);
        // $posts=Post::orderBy("created_at","DESC")->paginate(2);
        // $posts=Post::orderBy("created_at","DESC")->get();
        //$posts=Post::withTrashed()->get();
        $posts=User::find(Auth::id())->posts;//ログインしているアカウントだけのPost(投稿)を持ってきている。
        return view("posts.index")->with("posts",$posts)
                                    ->with("categories",$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();
        if($categories->count()==0||$tags->count()==0){
            Session::flash("info","You must have some categories and tags before attempting to create a post");
            return redirect()->back();
        }
        return  view ("posts.create")->with('categories',$categories)->with("tags",$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {


        $featured=$request->featured;

        $featured_new_name=time().$featured->getClientOriginalName();

        $featured->move("uploads/posts",$featured_new_name);

        $post=Post::create([
            "title"=>$request->title,
            "content"=>$request->content,
            "category_id"=>$request->category_id,
            "user_id"=>Auth::id(),
            "slug"=>str_slug($request->title),//"laravel installation" →　"laravel-installation"
            "featured"=>"uploads/posts/".$featured_new_name
        ]);

        $post->tags()->attach($request->tags);

        $post->save();


        $post->save();

        Session::flash("success","Post Created Successfully");

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view("posts.show")->with("post",$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post=Post::findorFail($id);
        $categories=Category::all();
        return view("posts.create")->with("post",$post)
                                    ->with("categories",$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $post=Post::findorFail($id);        

        if($request->hasFile("featured")){
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move("uploads/posts",$featured_new_name);
            
            $post->featured="uploads/posts/".$featured_new_name;

            
        }

        $post->title=$request->title;
        $post->content=$request->content;        
        $post->save();

        Session::flash("success","Post Update Successfully");

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::withTrashed()->where("id",$id)->first();

        
        if($post->trashed()){
            File::delete($post->featured);
            
            $post->forceDelete();
        }
        else{
            $post->delete();
        }

        // $post=Post::findorFail($id);
        

        Session::flash("success","Post deleted Successfully");
        
        return redirect()->route("posts.index");
    }

    public function trashed(){
        $trashed=Post::onlyTrashed()->get();
        return view("posts.trashed")->with("posts",$trashed);
        //  return view("posts.index")->withPost($trashed);
    }
    public function restore($id){
        $post=Post::withTrashed()->where("id",$id)->first();
        $post->restore();
        Session::flash("success","Post trashed Successfully");
        return redirect()->route("posts.index");
    }
    // public function kill($id ){
    //     $post=Post::withTrashed()->where("id",$id)->first();

    //     $post->deleteImage();

    //     $post->forceDelete();
    //     Session::flash("success","Post destroyed Successfully");
    //     return redirect()->route("posts.index");
    // }

    
    public function search(Request $request){
        $categories=Category::all();
        $category=$request->get("category_id");
        $posts=Post::all()->where("category_id",$category);
        return view("posts.index")->with("posts",$posts)->with("categories",$categories);
    }
}
