@extends('layouts.home-master')
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
    <div class="title">Printing Service</div>
    <div class="content">

    <form method="post" action="{{route('service.store')}}" enctype ="multipart/form-data">
@csrf
        <div class="user-details">

          <div class="input-box">
          <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname"/>
          </div>

          <div class="input-box">
          <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname"/>
          </div>

          <div class="input-box">
          <label for="section">Course & Section</label>
            <input type="text" class="form-control" name="section" id="section"/>
          </div>

          <div class="input-box">
          <label for="filename">File Name</label>
            <input type="text" class="form-control" name="filename" id="filename"/>
          </div>

          <div class="input-box">
           <label for="options">Color Options:</label>

          <select id="options" name="options">
          <option value="blackWhite">Black and White</option>
          <option value="colored">Colored</option>
          </select>
          </div>

          <div class="input-box">
           <label for="options">Paper Size:</label>

          <select id="size" name="size">
          <option value="small">Small</option>
          <option value="medium">Medium</option>
          <option value="large">Large</option>
          </select>
          </div>
  
          </div>

          <div class="title">Email & File</div>

          <div class="user-details">

          <div class="input-box">
          <label for="email">Email </label>
          <input type="text" name="email" id="email" class="form-control">
          </div>

          <div class="input-box">
          <label for="town">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity"/>
          </div>

          <div class="form-group">
          <label for="image">Upload File </label>
          <input type="file" name="service_file" id="service_file" class="form-control">
          </div>

        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
@endsection