<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\City;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
         //array of objects
        return view('backend.hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();

        return view('backend.hotel.create',compact('cities'));
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
            "name" => "required",
            "photo" => "required",
            "type" => "required",
            "city" => "required"
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('hotle_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }
        // data store
        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->photo = $path;
        $hotel->type = $request->type;
        $hotel->city_id = $request->city;
        $hotel->save();
        // return redirect
        return redirect()->route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('backend.hotel.detail',compact("hotel"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel=Hotel::find($id);
        $cities=City::all();
        return view('backend.hotel.edit',compact('hotel', 'cities'));
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
            "name" => "required",
            "photo" => "sometimes",
            "type" => "required",
            "city"=>"required"//1
            
        ]);
        // if include file,upload
        if($request->file()){
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            $filePath = $request->file('photo')->storeAs('hotel_photo',$fileName,'public');
           $path = '/storage/'.$filePath;
        }else{
            $path = $request->oldphoto; //2
        }
        // data store
        //$staff = new Staff; //3
        $hotel=Hotel::find($id);
        $hotel->name= $request->name;
        $hotel->photo = $path;
        $hotel->type= $request->type;
        $hotel->city_id=$request->city;
        $hotel->save();

        // return redirect
        return redirect()->route('hotel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel=Hotel::find($id);
        $hotel->delete();
        return redirect()->route('hotel.index');
    }
}
