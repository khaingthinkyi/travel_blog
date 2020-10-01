@extends('backendtemplate')
@section('title','City Detail')

@section('content')
  <h1>City Detail</h1>

  <a href="{{route('city.index')}}" class="btn btn-primary mb-2">Back</a>

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset($city->photo)}}" alt="City Photo" class="card-img">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">Name:{{$city->name}}</h4>
          {{-- <p class="card-text">Photo: {{$city->photo}}</p> --}}
        

        </div>
      </div>
    </div>
  </div>

@endsection