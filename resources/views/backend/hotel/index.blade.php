@extends('backendtemplate')
@section('title','Hotel List')

@section('content')
<div class="row">
	<div class="col-md-12">
	<h1>Hotel List</h1>
	<a href="{{route('hotel.create')}}" class="btn btn-success">Add New Hotel</a>
	{{-- Table --}}
	<table class="table my-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Hotel Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($hotels as $hotel)
			<tr>
				<td>{{$hotel->id}}</td>
				<td>{{$hotel->name}}</td>
				{{-- <td><img src="{{URL::asset($hotel->photo)}}" style="width: 100px;height:100px;"></td>
				<td>{{$hotel->city->name}}</td> --}}
				<td>
					<a href="{{route('hotel.show',$hotel->id)}}" class="btn btn-info">Detail</a>
					<a href="{{route('hotel.edit',$hotel->id)}}" class="btn btn-warning">Edit</a>
					<form method="post" action="{{route('hotel.destroy',$hotel->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block" >
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