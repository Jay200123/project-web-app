@extends('layouts.officer_master')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }

    .btn-download {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.btn-download:hover {
  background-color: #0062cc;
}
</style>
<div class="card push-top">
  <div class="card-header">
  <i class="fa fa-cog"  aria-hidden="true"></i> Update Service
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{route('service.update', $service->service_id)}}" enctype ="multipart/form-data">

          <div class="form-group">
          @csrf 
              @method('PUT')
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ $service->fname }}"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ $service->lname }}"/>
          </div>

          <div class="form-group">
              <label for="section">Section</label>
              <input type="text" class="form-control" name="section" value="{{ $service->section }}"/>
          </div>

          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{ $service->email }}"/>
          </div>

          <div class="form-group">
              <label for="filename">File Name</label>
              <input type="text" class="form-control" name="filename" value="{{ $service->filename }}"/>
          </div>

          <div class="form-group">
              <label for="options">Colored Options</label>
              <input type="text" class="form-control" name="options" value="{{ $service->options }}"/>
          </div>

          <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" name="quantity" value="{{ $service->quantity }}" readonly/>
          </div>

          <div class="form-group">
              <label for="date_placed">Date Placed</label>
              <input type="text" class="form-control" name="date_placed" value="{{ $service->date_placed }}"/>
          </div>

          <div class="form-group">
              <label for="cost">Cost</label>
              <input type="text" class="form-control" name="cost" value="{{ $service->cost }}"/>
          </div>

          <div class="form-group" hidden>
              <label for="file">File</label>
              <input type="file" class="form-control" name="service_file" value="{{ asset($service->service_file) }}"/>
          </div>

          <div class="form-group">
            <a href="{{asset($service->service_file)}}" class="btn-download" download>Download File</a>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
      <br>
  </div>
</div>
@endsection