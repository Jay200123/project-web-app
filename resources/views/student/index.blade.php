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
          <td>Title</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Address</td>
          <td>Phone</td>
          <td>City</td>
          <td>Image</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($student as $student)
        <tr>
            <td>{{$student->student_id}}</td>
            <td>{{$student->title}}</td>
            <td>{{$student->fname}}</td>
            <td>{{$student->lname}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->town}}</td>
            <td>{{$student->city}}</td>
           <td><img src="{{ asset($student->student_image)}}" width="80" height="80" alt="student.jpeg"></td>
            <td class="text-center">
            <form method="post" action="#">
              @csrf
              <input type="hidden" name="_method" value="DELETE" />
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
@endsection