@extends('layouts.officer_master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/member.form.css')}}">
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="300px">
</div>

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif

 
    <h4 align="center">MTICS LOGBOOK</h4>
    <form method="POST" action="{{route('officer.store')}}">
    @csrf
    <label for="timeIn">Time In</label>
        <div class="field">
        <input type="time" class="form-control" name="timeIn" id="timeIn"/>       
        </div>
         <br>
        <label for="timeOut">Time Out</label>
         <div class="field">
        <input type="time" class="form-control" name="timeOut" id="timeOut"readonly/>       
        </div>

        <div class="content">
          <div class="checkbox">
        </div>

        <div></div>
        </div>

        <div class="field">
        <input type="submit" class="btn btn-block btn-danger"></input>
        </div>
      </form>
    </div>

</div>
@endsection