@extends('backendtemplate')
@section('title','Location List')

@section('content')
<div class="row">
	<div class="col-md-12">
	<h1>Post List</h1>
	<a href="{{route('post.create')}}" class="btn btn-success">Add New Post</a>
	{{-- Table --}}
	<table class="table my-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>Location</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				{{-- <td><img src="{{URL::asset($post->photo)}}" style="width: 100px;height:100px;"></td> --}}
				<td>{{$post->location->title}}</td>
				<td>
					<a href="{{route('post.show',$post->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('post.edit',$post->id)}}" class="btn btn-warning">Edit</a>
					<form method="post" action="{{route('post.destroy',$post->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
						@csrf
						@method('DELETE')
						<input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
@endsection