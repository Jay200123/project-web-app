@extends('layouts.home-master')
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

 
    <h4 align="center">Admin</h4>
    <form method="POST" action="{{ route('admin.store') }}">
    @csrf
         <label for="name">Admin Name</label>
        <div class="field">
        <input type="text" class="form-control" name="name" id="name"/>       
        </div>

         <br>
        <label for="email">Email</label>
         <div class="field">
        <input type="text" class="form-control" name="email" id="email"/>       
        </div>
        <br>
        <label for="password">Password</label>
         <div class="field">
        <input type="password" class="form-control" name="password" id="password"/>       
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
@endsection
