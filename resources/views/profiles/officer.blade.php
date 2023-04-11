@extends('layouts.officer_master')
@section('title')
Officer Profile
@endsection
@section('content')
<link rel="icon" href="{{asset('images/MTICS.png')}}" type = "image/x-icon"> 
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>
  
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
  </div>     
@endif


<div align="right">
<span class="image">
    <img src="/../images/MTICS1.png" width="500px">
</span>
</div>

<div class="wrapper">
    
    <div class="left" id="stud">
        <div class="stud">
        <img src="{{ asset($officer->student_image) }}" alt="user">
        </div>
        <h5>{{Auth::user()->role}}</h5>
        <h3>{{$officer->title}}. {{$officer->fname}} {{$officer->lname}}</h3>
        <BR>
         <h5>Course & Section</h5>
         <h4>{{$officer->section}}</h4>
    </div>
    <div class="right">
        <div class="info">
            <h3>officer Info.</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <h4 style="color:black">{{Auth::user()->email}}</h4>
                 </div> 
                 <div class="data">
                    <h4>Phone</h4>
                    <h4 style="color:black">{{$officer->phone}}</h4>                
                </div> 
            </div>
        </div>

        <div class="social_media">

        <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
              <a href="{{route('officers.edit', $officer->student_id)}}" type="button" class="btn btn-success m-2" id="button1">Update Record
              </a>
            </div>
          </div>
        </ul>
          

            <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Log Records</button>
        </div>
          </ul>

              <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
              <a href="{{route('officer.timeIn')}}" type="button" class="btn btn-primary" id="button1">Time In</a>
            </div>
          </div>
        </ul>

        <ul>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <a href="{{route('officer.timeOut', $officer->user_id)}}" type="button" class="btn btn-primary" id="button2">Time Out</a>
            </div>
          </div>
        </ul>

        </div>
        <br>
      
      <div class="projects">
            <h3>INFORMATION</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Address</h4>
                    <h4 style="color:black">{{$officer->address}}</h4>
                 </div>
                 <div class="data">
                    <h4>Town</h4>
                    <h4 style="color:black">{{$officer->town}}</h4>
                 </div>
                 <div class="data">
                   <h4>City</h4>
                   <h4 style="color:black">{{$officer->city}}</h4>
              </div>
            </div>
</div>      
</div>
</div>


       
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Log Records</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <h3 class="text-center">Past Log Records</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card">
                        @if($officer->logs->count() === 0)
                        <h2 class="text-center">No Records Yet!</h2>
                        @else
                        @foreach($officer->logs as $logs)
                        <div class="card-body">
                            <h3 class="card-text">Log Date: {{ $logs->log_date }}</h3>
                            <h5 class="card-subtitle mb-2 text-muted">Time In: {{ $logs->timeIn }}</h5>
                            <h5 class="card-subtitle mb-2 text-muted">Time Out: {{ $logs->timeOut }}</h5>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

@endsection
