@extends('layouts.admin_master')
@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }

</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="tuf" align="center">
    <img src="/../images/MTICS.png" width="150px" height="150px">
</div>
<h4 align="center">MTICS Change User Role</h4>
<div class="card push-top">

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
      <form method="POST" action="{{ route('roles.update', $user->id) }}" enctype ="multipart/form-data">
      @csrf 
              @method('PUT')
         <div class="form-group">
         <label for="name">User Name</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly/>
          </div>

          <div class="form-group">
         <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly/>
          </div>

          <div class="form-group">
          <label for="role">User Current Role:</label>
          <input type="text" class="form-control" name="text" value="{{ $user->role }}" readonly/>
          <br>
          <label for="role">Change Role:</label>
          <select id="role" name="role">
          <option value="admin">Admin</option>
          <option value="president">President</option>
          <option value="officer">Officer</option>
          <option value="student">Student</option>
          <option value="unregistered">Unregistered</option>
          </select>
          </div>

          <button type="submit" class="btn btn-block btn-success">Update</button>
      </form>
  </div>
</div>
@endsection