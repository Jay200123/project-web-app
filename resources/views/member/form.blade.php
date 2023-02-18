@extends('layouts.master')
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
     <div class="image">
        <img src="{{url('/images/mtics-logo.jpeg')}}" class="logo-image">
     </div>
     <form method="POST" action="{{route('member.register')}}">
     <h4>MTICS</h4>
     <h4>Membership fee:</h4>
     @csrf
    <div class="form-group">
      <label for="amount">Amount:</label>
              <input type="decimal" class="form-control" name="amount" id="amount" value="25.00" readonly/>
              <br>
              <button type="submit" class="btn btn-block btn-danger">Register</button>
    </div>
    </form>
</div>
@endsection