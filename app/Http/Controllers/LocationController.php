<?php

namespace App\Http\Controllers;
use App\Location;
use App\City;
use App\Post;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
         //array of objects
        return view('backend.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();

        return view('backend.location.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        // validation
        $request->validate([
            "title" => "required",
            "photo" => "required",
            "city" => "required"
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('location_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }
        // data store
        $location = new Location;
        $location->title= $request->title;
        $location->photo= $path;
        $location->city_id = $request->city;
        
        $location->save();

        // return redirect
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('backend.location.detail',compact("location"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::find($id);
        $cities=City::all();
        return view('backend.location.edit',compact('location','cities'));
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
            "city"=>"required"//1
            
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('location_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto; //2
        }
        // data store
        //$staff = new Staff; //3
        $location=Location::find($id);
        $location->title= $request->title;
        $location->photo = $path;
        $location->city_id=$request->city;
        $location->save();

        // return redirect
        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location=Location::find($id);
        $location->delete();
        return redirect()->route('location.index');

    }
}
