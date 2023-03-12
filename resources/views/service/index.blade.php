@extends('layouts.officer_master')
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
          <td>First Name</td>
          <td>Last Name</td>
          <td>Section</td>
          <td>Email</td>
          <td>File Name</td>
          <td>Color Option</td>
          <td>Cost</td>
          <td>Quantity</td>
          <td>Date Placed</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($service as $services)
        <tr>
            <td>{{$services->service_id}}</td>
            <td>{{$services->fname}}</td>
            <td>{{$services->lname}}</td>
            <td>{{$services->section}}</td>
            <td>{{$services->email}}</td>
            <td>{{$services->filename}}</td>
            <td>{{$services->options}}</td>
            <td>{{$services->cost}}</td>
            <td>{{$services->quantity}}</td>
            <td>{{$services->date_placed}}</td>
            <td class="text-center">
            <a href="{{route('service.edit', $services->service_id)}}" class = "btn btn-primary btn-sm">Update</a>
            <form method="post" action="{{route('service.delete', $services->service_id)}}">
              @csrf
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
@endsection
