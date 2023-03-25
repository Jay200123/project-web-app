@extends('layouts.officer_master')
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

@foreach($officer as $officer)

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
        <p>{{Auth::user()->role}}</p>
        <h3>{{$officer->title}}. {{$officer->fname}} {{$officer->lname}}</h3>
        <BR>
         <p>Course & Section</p>
         <h4>{{$officer->section}}</h4>
    </div>
    <div class="right">
        <div class="info">
            <h3>officer Info.</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>{{Auth::user()->email}}</p>
                 </div> 
                 <div class="data">
                    <h4>Phone</h4>
                    <p>{{$officer->phone}}</p>                
                </div> 
            </div>
        </div>

        <div class="social_media">
            <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('officers.edit', $officer->student_id)}}" type="button" class="btn btn-success">Update</a>
            </div>
            </div>
          </ul>
          <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('officer.timeIn')}}" type="button" class="btn btn-primary">Time In</a>
            </div>
            </div>
          </ul>

          <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('officer.timeOut', $officer->user_id)}}" type="button" class="btn btn-primary">Time Out  </a>
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
                    <p>{{$officer->address}}</p>
                 </div>
                 <div class="data">
                    <h4>Town</h4>
                    <p>{{$officer->town}}</p>
                 </div>
                 <div class="data">
                   <h4>City</h4>
                    <p>{{$officer->city}}</p>
              </div>
            </div>
        </div>

    
      
@endforeach
      
        
    </div>
</div>
@endsection
