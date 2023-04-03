@extends('layouts.officer_master')
@section('title')
Event Forms
@endsection
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<div class="margin">
<div class="card push-top">
  <div class="card-header">
  <h3>Welcome to MTICS Official Website<i class="fa fa-globe" aria-hidden="true"></i></h3>
  </div>
  <h3>Make an Event</h3>
  <div class="push-top">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif

  <div class="card-body">
    @if ($errors->any())
    <h1>Sign Up</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/> 
    @endif

      <form method="post" action="{{ route('events.store') }}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="title">Event Title</label>
              <input type="text" class="form-control" name="title" id="title"/>
           </div>
    
          <div class="form-group">
              <label for="date_occured">Event Occurence</label>
              <input type="number" class="form-control" name="date_occured" id="date_occured"/>
          </div>

          <div class="form-group">
          <label for="image" class="control-label">Image</label>
          <input type="file" class="form-control" id="event_image" name="event_image" multiple>
          
          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
          </div>
          <button type="submit" class="btn btn-block btn-success">Submit Event</button>
      </form>

</div>
</div>
  </div>
@endsection