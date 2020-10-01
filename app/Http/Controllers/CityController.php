<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        return view('backend.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "photo" => "required",
              ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('city_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }
        // data store
        $city = new City;
        $city->name = $request->name;
        $city->photo = $path;
        
        $city->save();

        // return redirect
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('backend.city.detail',compact("city"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=City::find($id);
        return view('backend.city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);

        // validation
        $request->validate([
            "name" => "required",
            "photo" => "sometimes", //1
            
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('city_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto; //2
        }
        // data store
        //$staff = new Staff; //3
        $city=City::find($id);
        $city->name = $request->name;
        $city->photo = $path;
        $city->save();

        // return redirect
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city=City::find($id);
        $city->delete();
        return redirect()->route('city.index');
    }
}
