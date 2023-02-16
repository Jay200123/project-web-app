@extends('layouts.master')
@section('content')
<style>

.background{
     margin: 0;
     padding: 0;
     height: 100vh;
     overflow: hidden;
     background: linear-gradient(to left, blue, lightblue);
    }
    
.profile-containers{
    margin:10px;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .profile-cards{
    display: flex;
    background-color: white;
     color: black;
    flex-direction: column;
    align-items: center;
    max-width: 400px;
    width: 100%;
    border-radius: 25px;
    padding: 30px;
    border: 1px solid #ffffff40;
    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
  }

  .image{
    position: relative;
    height: 150px;
    width: 150px;
  }

  .image .profile-pic{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
  }

  .data{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 15px;
  }

  .data h2{
    font-size: 33px;
    font-weight: 600;
  }

  span{
    font-size: 15px;
  }

  .row{
    display: flex;
    align-items: center;
    margin-top: 30px;
  }

  .row .info{
    text-align: center;
    padding: 0 20px;
  }

  .buttons{
    display: flex;
    align-items: center;
    margin-top: 30px;
  }

  .buttons .btn{
    color: #fff;
    text-decoration: none;
    margin: 0 20px;
    padding: 8px 25px;
    border-radius: 25px;
    font-size: 18px;
    white-space: nowrap;
    background: linear-gradient(to left, black 0%, blue 100%);
  } 

  .buttons .btn-submit:hover{
    color: red;

  }

  .buttons .btn:hover{
    box-shadow: inset 0 5px 20px rgba(0,0,0,0.4);
  }

</style>
<body class="background">
<div class="card-body">
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
<div class="profile-containers">
  <h3>Welcome to MTICS Web Application</h3>
@foreach($student as $student)
    <div class="profile-cards">
        <div class="image">
        <img src="{{ asset($student->student_image) }}" class="profile-pic">
        </div>
        <div class="data">
          <h4>{{Auth::user()->name}}</h4>
          <span><i class="fa fa-envelope" aria-hidden="true"></i>Email:{{Auth::user()->email}}</span>
        </div>
        <div class="row">
          <div class="info">
            <h5><i class="fa fa-id-card" aria-hidden="true"></i>First Name</h5>
            <span>{{$student->fname}}</span>
          </div>
          <div class="info">
            <h5><i class="fa fa-id-card" aria-hidden="true"></i>Last Name</h5>
            <span>{{$student->lname}}</span>
          </div>
          <div class="info">
            <h5><i class="fa fa-mobile" aria-hidden="true"></i>Mobile Number</h5>
            <span>{{$student->phone}}</span>
          </div>
        </div>
        <div class="buttons">
          <a href="#" class="btn">Test</a>
          <a href="#" class="btn">Test</a>
        </div>
      </div>
      @endforeach
      </div>          
@endsection