@extends('layouts.officer_master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
    <h1>Update Service Record</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<br>
 <div class="container">
    <div class="title">Update Service</div>
    <div class="content">

    <form method="post" action="{{ route('service.update', $service->service_id) }}" enctype ="multipart/form-data">
@csrf
@method('PUT')
        <div class="user-details">

          <div class="input-box">
          <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" value="{{ $service->fname }}" readonly/>
          </div>

          <div class="input-box">
          <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{ $service->lname }}" readonly/>
          </div>

          <div class="input-box">
          <label for="section">Section</label>
            <input type="text" class="form-control" name="section" value="{{ $service->section }}" readonly/>
          </div>

          <div class="input-box">
          <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $service->email }}" readonly/>
          </div>

          <div class="input-box">
          <label for="filename">File Name</label>
            <input type="text" class="form-control" name="filename" value="{{ $service->filename }}" readonly/>
          </div>

          <div class="input-box">
          <label for="size">Paper Size</label>
            <input type="text" class="form-control" name="size" value="{{ $service->size }}" readonly/>
          </div>

          <div class="input-box">
          <label for="options">Color Options</label>
            <input type="text" class="form-control" name="options" value="{{ $service->options }}" readonly/>
          </div>

          <div class="input-box">
          <label for="quantity">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{ $service->quantity }}" readonly/>
          </div>

          <div class="input-box">
          <label for="date_placed">Date Placed</label>
            <input type="text" class="form-control" name="date_placed"value="{{ $service->date_placed }}" readonly/>
          </div>

         <div class="input-box">
          <label for="date_placed">Cost</label>
            <input type="decimal" class="form-control" name="cost" value="{{ $service->cost }}"/>
          </div>

          <div class="input-box" hidden>
          <label for="file">File</label>
            <input type="file" class="form-control" name="service_file" value="{{asset($service->service_file)}}"/>
          </div>

         <div class="input-box">
          <a href="{{asset($service->service_file)}}" class="btn-download" download>Download File</a>
          </div>
  
          </div>

        <div class="button">
          <input type="submit" value="Update Service">
        </div>
      </form>
    </div>
  </div>
@endsection
  
