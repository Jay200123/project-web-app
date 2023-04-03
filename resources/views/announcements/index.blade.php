@extends('layouts.officer_base')
@section('title')
MTICS Event Records
@endsection
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .background{
  background-color: lightblue;
  color: black;
}

.margin{
  margin-top:50px;
  margin-bottom:50px;
  margin-right:50px;
  margin-left:50px;
  background: white;
  width: 90%;
  border-radius:10px;
  color:black;
  padding: 15px;
}
</style>
<body class="background">
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
 
<h3 style="text-align:center">MTICS Event Records</h3>
<div class="margin">
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
<div>
</body>
@endsection