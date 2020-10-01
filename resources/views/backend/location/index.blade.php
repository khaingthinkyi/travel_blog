@extends('backendtemplate')
@section('title','Location List')

@section('content')
<div class="row">
	<div class="col-md-12">
	<h1>Location List</h1>
	<a href="{{route('location.create')}}" class="btn btn-success">Add New Location</a>
	{{-- Table --}}
	<table class="table my-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Title</th>
				<th>City</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($locations as $location)
			<tr>
				<td>{{$location->id}}</td>
				<td>{{$location->title}}</td>
				<td>{{$location->city->name}}</td>
				<td>
					<a href="{{route('location.show',$location->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('location.edit',$location->id)}}" class="btn btn-warning">Edit</a>
					<form method="post" action="{{route('location.destroy',$location->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
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