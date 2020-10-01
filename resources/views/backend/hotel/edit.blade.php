@extends('backendtemplate')
@section('title','Hotel Edit')

@section('content')
	<h1>Hotel Edit</h1>
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	<form method="post" action="{{route('hotel.update',$hotel->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="InputCity">City:</label>
			<select name="city" class="form-control">
				<optgroup label="Choose City">
					@foreach($cities as $city)
					<option value="{{$city->id}}"
					@if($city->id==$hotel->city_id)
					{{'selected'}}
					@endif
					>{{$city->name}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
		<div class="form-group">
			<label for="InputName">Hotel Name:</label>
			<input type="text" name="name" class="form-control" id="InputName" value="{{$hotel->name}}">
		</div>
		<div class="form-group">
			<label for="InputPhoto">Photo:</label>
			<input type="file" name="photo" class="form-control-file" id="InputPhoto">
			<img src="{{asset($hotel->photo)}}" alt="profile image" style="width: 100px; height: 100px;">
			<input type="hidden" name="oldphoto" value="{{$hotel->photo}}">
		</div>
		<div class="form-group">
			<label for="InputType">Hotel Type:</label>
			<input type="text" name="type" class="form-control" id="InputType" value="{{$hotel->type}}">
		</div>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection