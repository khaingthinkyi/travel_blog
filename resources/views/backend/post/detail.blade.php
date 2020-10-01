@extends('backendtemplate')
@section('title','Post Detail')

@section('content')
  <h1>Post Detail</h1>

  <a href="{{route('post.index')}}" class="btn btn-primary mb-2">Back</a>

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="{{asset($post->photo)}}" alt="Post Photo" class="card-img" style="width: 200px; height: 200px;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title">Title:{{$post->title}}</h4>
          <p class="card-text">City: {{$post->location->title}}</p>
          <p class="card-text">City: {{$post->content}}</p>
          {{-- <p class="card-text">Photo: {{$city->photo}}</p> --}}
        

        </div>
      </div>
    </div>
  </div>

@endsection