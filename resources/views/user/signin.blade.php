@extends('layouts.home-master')
@section('title')
User Sign In
@endsection
<style>
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
      
    @endif
    <div class="tuf" align="center">
    <img src="{{asset('images/MTICS.png')}}" width="150px" height="150px">
</div>
<br>
    <div class="wrapper">
    <div class="title">MTICS Login</div>
      <form class="" action="{{route('login')}}" method="post">{{ csrf_field() }}

        <div class="field">
          <label for="email" aria-hidden="true"></label>
          <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="field">
          <label for="password" aria-hidden="true"></label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            @if($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="content">
          <div class="checkbox">
        </div>

        <div></div>
        </div>

        <div class="field">
          <input type="submit" value="Sign In">
        </div>
        <div class="signup-link">Not a member? <a href="{{route('student.signup')}}">Signup now</a></div>
      </form>
    </div>


 