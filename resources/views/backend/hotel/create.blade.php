@extends('backendtemplate')
@section('title','Hotel Create')

@section('content')
  <h1>Hotel Create</h1>
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
  <form method="post" action="{{route('hotel.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputCity">City:</label>
      <select name="city" class="form-control">
        <optgroup label="Choose City">
          @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
          @endforeach
        </optgroup>
      </select>
    </div>

    <div class="form-group">
      <label for="InputName">Hotel Name:</label>
      <input type="text" name="name" class="form-control" id="InputName">
    </div>

    <div class="form-group">
      <label for="InputPhoto">Photo:</label>
      <input type="file" name="photo" class="form-control-file" id="InputPhoto">
    </div>
    <div class="form-group">
      <label for="InputType">Hotel Type:</label>
      <input type="text" name="type" class="form-control" id="InputType">
    </div>

    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection

