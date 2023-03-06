@extends('layouts.officer_master')
@section('content')
<style>
    .form-containers{
    margin:5px;
    color: black;
    padding:10px;
    box-shadow:10px 15px black;
    border:solid 3px black;
    border-radius: 10px;
    text-align: center;
    position: absolute;
    width: 300px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .image{
    position: relative;
    height: 120px;
    width: 120px;
    border-radius:50%;
     top: 50%;
    left: 50%;
    box-shadow:5px 10px black;
    transform: translate(-50%, -50%);
    border: solid 3px black;
  }

  .image .logo-image{
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
  }
</style>

<div class="form-containers">
     <form method="POST" action="#">
     <h4>MTICS LOGBOOK</h4>
     <h4>Time In and Time Out</h4>
     @csrf
     @method('PUT')
    <div class="form-group">
      <label for="log_date">Date Logged</label>
      <input type="date" class="form-control" name="log_date" id="log_date" value="{{logs->log_date}}" readonly/>   
    </div>

    <div class="form-group">
      <label for="timeIn">Time In</label>
      <input type="time" class="form-control" name="timeIn" id="timeIn" value="{{logs->timeIn}}" readonly/>   
    </div>

    <div class="form-group">
      <label for="timeOut">timeOut</label>
      <input type="time" class="form-control" name="timeOut" id="timeOut"/>   
    </div>
    <button type="submit" class="btn btn-block btn-danger">Time Out</button>
   
    </form>
</div>
@endsection