@extends('backendtemplate')
@section('title','Location Create')

@section('content')
  <h1>Location Create</h1>
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
  <form method="post" action="{{route('location.store')}}" enctype="multipart/form-data">
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
      <label for="InputTitle">Location Title:</label>
      <input type="text" name="title" class="form-control" id="InputTitle">
    </div>

    <div class="form-group">
      <label for="InputPhoto">Photo:</label>
      <input type="file" name="photo" class="form-control-file" id="InputPhoto">
    </div>

    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection

