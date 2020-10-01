@extends('backendtemplate')
@section('title','City Edit')

@section('content')
	<h1>City Edit</h1>
	{{-- Error --}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	{{-- Form --}}
	<form method="post" action="{{route('city.update',$city->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		
		<div class="form-group">
			<label for="InputName">Name:</label>
			<input type="text" name="name" class="form-control" id="InputName" value="{{$city->name}}">
		</div>
		<div class="form-group">
			<label for="InputPhoto">Photo:</label>
			<input type="file" name="photo" class="form-control-file" id="InputPhoto">
			<img src="{{asset($city->photo)}}" alt="profile image" style="width: 100px; height: 100px;">
			<input type="hidden" name="oldphoto" value="{{$city->photo}}">
		</div>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection