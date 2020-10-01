@extends('backendtemplate')
@section('title','Location Detail')

@section('content')
  <h1>Location Detail</h1>

  <a href="{{route('location.index')}}" class="btn btn-primary mb-2">Back</a>

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset($location->photo)}}" alt="Location Photo" class="card-img" style="width: 200px; height: 200px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">Title:{{$location->title}}</h4>
          <p class="card-text">City: {{$location->city->name}}</p>
          {{-- <p class="card-text">Photo: {{$city->photo}}</p> --}}
        

        </div>
      </div>
    </div>
  </div>

@endsection