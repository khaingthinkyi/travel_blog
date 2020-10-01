@extends('backendtemplate')
@section('title','Hotel Detail')

@section('content')
  <h1>Hotel Detail</h1>

  <a href="{{route('hotel.index')}}" class="btn btn-primary mb-2">Back</a>

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset($hotel->photo)}}" alt="Hotel Photo" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">Title:{{$hotel->name}}</h4>
          <p class="card-title">Type:{{$hotel->type}}</p>
          <p class="card-text">City: {{$hotel->city->name}}</p>
          {{-- <p class="card-text">Photo: {{$city->photo}}</p> --}}
        

        </div>
      </div>
    </div>
  </div>

@endsection