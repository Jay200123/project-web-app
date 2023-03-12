@extends('layouts.master')
@section('content')
<div class="card push-top">
  <div class="card-header">
  <h3>Welcome to MTICS Official Website<i class="fa fa-globe" aria-hidden="true"></i></h3>
  <h4><i class="fa fa-print" aria-hidden="true"></i>MTICS Printing Services</h4>
  </div>

  @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
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
      <form method="post" action="{{route('service.store')}}" enctype ="multipart/form-data">
        @csrf
          <div class="form-group">
              @csrf
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" id="lname"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" id="lname"/>
          </div>

          <div class="form-group">
              <label for="section">Course & Section</label>
              <input type="text" class="form-control" name="section" id="section"/>
          </div>

          <div class="form-group">
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" class="form-control">
          </div>  
          
          <div class="form-group">
                <label for="filename">File Name: </label>
                <input type="text" name="filename" id="filename" class="form-control">
          </div>  

          <div class="form-group">
          <label for="options">Color Options:</label>

          <select id="options" name="options">
          <option value="blackWhite">Black and White</option>
          <option value="colored">Colored</option>
          </select>
          </div>

          <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="quantity"/>
          </div>

          <div class="form-group">
                <label for="file">Upload File</label>
                <input type="file" name="service_file" id="service_file" class="form-control">
          </div>


             <button type="submit" class="btn btn-success">Submit</button>
      </form>
      <br>
  </div>
</div>
@endsection