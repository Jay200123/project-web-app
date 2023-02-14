@extends('layouts.master')
@section('content')
<div class="card push-top">
  <div class="card-header">
  <h3>Welcome to MTICS Official Website<i class="fa fa-globe" aria-hidden="true"></i></h3>
  <h5>Register as a Student</h5>
  </div>

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
      <form method="post" action="{{route('student.signups')}}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title"/>
          </div>

          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" id="fname"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname"/>
          </div>

          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone"/>
          </div>

          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address"/>
          </div>

          <div class="form-group">
              <label for="town">Town</label>
              <input type="text" class="form-control" name="town" id="town"/>
          </div>

          <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city"/>
          </div>

          <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" class="form-control">
          </div>

          <div class="form-group">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" class="form-control">
          </div>

          <div class="form-group">
                <label for="image">Upload Photo: </label>
                <input type="file" name="student_image" id="student_image" class="form-control">
          </div>


             <button type="submit" class="btn btn-block btn-danger">Register</button>
      </form>
  </div>
</div>
@endsection