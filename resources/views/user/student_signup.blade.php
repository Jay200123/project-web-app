@extends('layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
    <h1>Sign Up</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif


 <div class="container">
    <div class="title">Registration</div>
    <div class="content">

    <form method="post" action="{{route('student.signups')}}" enctype ="multipart/form-data">
@csrf
        <div class="user-details">

         <div class="input-box">
          <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title"/>
          </div>

          <div class="input-box">
          <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname"/>
          </div>

          <div class="input-box">
          <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname"/>
          </div>

          <div class="input-box">
          <label for="section">Section</label>
            <input type="text" class="form-control" name="section" id="section"/>
          </div>

          <div class="input-box">
          <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone"/>
          </div>

          <div class="input-box">
          <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address"/>
          </div>

          <div class="input-box">
          <label for="town">Town</label>
            <input type="text" class="form-control" name="town" id="town"/>
          </div>

          <div class="input-box">
          <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city"/>
          </div>

  
          </div>

          <div class="title">Email & Password</div>

          <div class="user-details">

          <div class="input-box">
          <label for="email">Email </label>
          <input type="text" name="email" id="email" class="form-control">
          </div>

          <div class="input-box">
          <label for="password">Password </label>
          <input type="password" name="password" id="password" class="form-control">
          </div>

          <div class="form-group">
          <label for="image">Upload Photo </label>
          <input type="file" name="student_image" id="student_image" class="form-control">
          </div>

        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
@endsection
  
