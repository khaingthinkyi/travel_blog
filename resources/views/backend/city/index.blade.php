@extends('backendtemplate')
@section('title','City List')

@section('content')
<div class="row">
	<div class="col-md-12">
	<h1>City List</h1>
	<a href="{{route('city.create')}}" class="btn btn-success">Add New City</a>
	{{-- Table --}}
	<table class="table my-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cities as $city)
			<tr>
				<td>{{$city->id}}</td>
				<td>{{$city->name}}</td>
				{{-- <td>{{$city->photo}}</td> --}}
				<td>
					<a href="{{route('city.show',$city->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('city.edit',$city->id)}}" class="btn btn-warning">Edit</a>
					<form method="post" action="{{route('city.destroy',$city->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
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