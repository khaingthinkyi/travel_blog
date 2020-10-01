@extends('backendtemplate')
@section('title','City Create')

@section('content')
  <h1>City Create</h1>
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
  <form method="post" action="{{route('city.store')}}" enctype="multipart/form-data">
    @csrf
    

    <div class="form-group">
      <label for="InputTitle">City Name:</label>
      <input type="text" name="name" class="form-control" id="InputTitle">
    </div>

    <div class="form-group">
      <label for="InputPhoto">Photo:</label>
      <input type="file" name="photo" class="form-control-file" id="InputPhoto">
    </div>

    
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection

