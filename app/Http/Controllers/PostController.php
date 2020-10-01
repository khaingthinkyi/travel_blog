<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('backend.post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations=Location::all();
        return view('backend.post.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validation
        $request->validate([
            "title" => "required",
            "photo" => "required",
            "content" => "required",
            "location"=>"required"
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('post_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }
        // data store
        $post = new Post;
        $post->title= $request->title;
        $post->photo= $path;
        $post->content = $request->content;
        $post->location_id=$request->location;
        
        $post->save();

        // return redirect
        return redirect()->route('post.index');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.post.detail',compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $locations=Location::all();
        return view('backend.post.edit',compact('post','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            "title" => "required",
            "photo" => "sometimes", 
            "content"=>"required",//1
            "location"=>"required"
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('post_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto; //2
        }
        // data store
        //$staff = new Staff; //3
        $post=Post::find($id);
        $post->title= $request->title;
        $post->photo = $path;
        $post->location_id=$request->location;
        $post->content=$request->content;
        $post->save();

        // return redirect
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('post.index');

    }
}
