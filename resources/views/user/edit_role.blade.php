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
      <form method="POST" action="{{ route('roles.update', $user->id) }}" enctype ="multipart/form-data">
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
          <label for="role">User Current Role:</label>
          <input type="text" class="form-control" name="text" value="{{ $user->role }}" readonly/>
          <br>
          <label for="role">Change Role:</label>
          <select id="role" name="role">
          <option value="officer">Officer</option>
          <option value="student">Student</option>
          <option value="unregistered">Unregistered</option>
          </select>
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection