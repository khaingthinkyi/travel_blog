@extends('backendtemplate')
@section('title','Post Edit')

@section('content')
	<h1>Post Edit</h1>
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	
	<form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="InputLocation">Location</label>
			<select name="location" class="form-control">
				<optgroup label="Choose Location">
					@foreach($locations as $location)
					<option value="{{$location->id}}"
					@if($location->id==$location->location_id)
					{{'selected'}}
					@endif
					>{{$location->title}}</option>
					@endforeach
				</optgroup>
			</select>
		</div>
		<div class="form-group">
			<label for="InputTitle">Title:</label>
			<input type="text" name="title" class="form-control" id="InputTitle" value="{{$post->title}}">
		</div>
		<div class="form-group">
			<label for="InputPhoto">Photo:</label>
			<input type="file" name="photo" class="form-control-file" id="InputPhoto">
			<img src="{{asset($post->photo)}}" alt="profile image" style="width: 100px; height: 100px;">
			<input type="hidden" name="oldphoto" value="{{$post->photo}}">
		</div>

		<div class="form-group">
			<label for="InputTitle">Content:</label>
			<textarea name="content">{{$post->content}}</textarea>
		</div>
		
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
@endsection