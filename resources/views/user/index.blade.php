@extends('layouts.admin_master')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
 
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Section</td>
          <td>Roles</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->students->section}}</td>
            <td>{{$user->role}}</td>
            <td class="text-center">
            <a href="{{ route('roles.edit', $user->id) }}" class = "btn btn-primary btn-sm">Edit Role</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
@endsection
