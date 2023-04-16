@extends('layouts.officer_master')
@section('title')
Event Forms
@endsection
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
    <h1>Update Service Record</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<br>
 <div class="container">
    <div class="title">Update Events</div>
    <div class="content">
    <br>

      <form method="post" action="{{route('events.update', $event->event_id)}}" enctype ="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="form-group">
              @csrf
              <label for="title">Event Title</label>
              <input type="text" class="form-control" name="title" value="{{$event->title}}"/>
           </div>

           <div class="form-group">
              <label for="date_occured">Date Announce</label>
              <input type="text" class="form-control" name="date_placed" value="{{$event->date_placed}}"/>
          </div>
    
          <div class="form-group">
              <label for="date_occured">Event Occurence</label>
              <input type="date" class="form-control" name="date_occured" value="{{$event->date_occured}}"/>
          </div>

       
          <div class="form-group">
           <label for="image" class="control-label">Event Image</label>
           @if ($event->event_image)
           <div class="image-box">
            <img class="pic" src="{{ asset($event->event_image) }}" height="200" width="350" alt="event.jpeg">
            </div>
          @else
           <p>No image uploaded</p>
        @endif
        </div>

          <div class="form-group">
          <label for="image" class="control-label">Update Image</label>
          <input type="file" class="form-control" value="{{$event->event_image}}" name="event_image" multiple>
           </div>
          @error('images')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
   
          </div>
          
          <div class="button">
          <input type="submit" value="Update Event">
        </div> 
      </form>
</div>
</div>
  </div>
@endsection
