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
<div class="card push-top">
  <div class="card-header">
  <i class="fa fa-address-card" aria-hidden="true"></i> Update User's Role
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
      <form method="PUT" action="#" enctype ="multipart/form-data">
      @csrf 
              @method('PUT')
         <div class="form-group">
         <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}" readonly/>
          </div>

          <div class="form-group">
         <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly/>
          </div>

          <div class="form-group">
              <label for="role">Role</label>
              <input type="text" class="form-control" name="role" value="{{ $user->role }}"/>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection