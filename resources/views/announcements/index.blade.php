@extends('layouts.officer_master')
@section('title')
MTICS Event Records
@endsection
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .content{
  margin-top: 75px;
  margin-left: 75px;
  margin-right: 75px;
  border-radius: 5px;
  width: 90%;
  background: #FFFFFF;
  padding: 10px;   
    }

</style>



<div class="push-top">
<div class="card-body">
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
  </div> 

<br>

<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>

<h3 style="text-align:center">MTICS Shop Products</h3> 
<div class="content"> 
<div class="col col-md-6">
    <a href="{{route('events.create')}}" class="btn btn-success btn-sm">Add New Event</a>
</div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Event ID</td>
          <td>Title</td>
          <td>Date Placed</td>
          <td>Date Occured</td>
          <td>Event Image</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
    @if(!empty($events) && $events->count())
        @foreach($events as $event)
        <tr>
            <td>{{$event->event_id}}</td>
            <td>{{$event->title}}</td>
            <td>{{$event->date_placed}}</td>
            <td>{{$event->date_occured}}</td>
            <td><img src="{{ asset($event->event_image) }}" width = "120" height="90" alt="event.jpeg"></td>
            <td class="text-center">
            <a href="{{route('events.edit', $event->event_id)}}" class ="btn btn-primary btn-sm">Edit</a>
            <td>
            <form method="post" action="{{route('events.destroy', $event->event_id)}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
            </td>
        </tr>
        @endforeach
        @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
    </tbody>
  </table>
  {!! $events->links() !!}
  </div>
  
  <footer style="text-align:center">@2023 Manila Technician Institute Computer Society TUP Taguig All rights reserved.</footer>
@endsection