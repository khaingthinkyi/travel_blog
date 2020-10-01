@extends('backendtemplate')
@section('title','Location Edit')

@section('content')
	<h1>Location Edit</h1>
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	<form method="post" action="{{route('location.update',$location->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="InputCity">City:</label>
			<select name="city" class="form-control">
				<optgroup label="Choose City">
					@foreach($cities as $city)
					<option value="{{$city->id}}"
					@if($city->id==$location->city_id)
					{{'selected'}}
					@endif
					>{{$city->name}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
		<div class="form-group">
			<label for="InputTitle">Title:</label>
			<input type="text" name="title" class="form-control" id="InputTitle" value="{{$location->title}}">
		</div>
		<div class="form-group">
			<label for="InputPhoto">Photo:</label>
			<input type="file" name="photo" class="form-control-file" id="InputPhoto">
			<img src="{{asset($location->photo)}}" alt="profile image" style="width: 100px; height: 100px;">
			<input type="hidden" name="oldphoto" value="{{$location->photo}}">
		</div>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection