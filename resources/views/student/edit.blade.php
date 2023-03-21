@extends('layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/signup.css')}}">
<div class="card-body">
    @if ($errors->any())
    <h1>Update Data</h1>
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

<br>
 <div class="container">
    <div class="title">Update Student's Data</div>
    <div class="content">

    <form method="post" action="{{ route('students.update', $students->student_id) }}" enctype ="multipart/form-data">
@csrf
@method('PUT')
        <div class="user-details">

         <div class="input-box">
          <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $students->title }}"/>
          </div>

          <div class="input-box">
          <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" value="{{ $students->fname }}"/>
          </div>

          <div class="input-box">
          <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" value="{{ $students->lname }}"/>
          </div>

          <div class="input-box">
          <label for="section">Section</label>
            <input type="text" class="form-control" name="section" value="{{ $students->section }}"/>
          </div>

          <div class="input-box">
          <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $students->phone }}"/>
          </div>

          <div class="input-box">
          <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $students->address }}"/>
          </div>

          <div class="input-box">
          <label for="town">Town</label>
            <input type="text" class="form-control" name="town" value="{{ $students->town }}"/>
          </div>

          <div class="input-box">
          <label for="city">City</label>
            <input type="text" class="form-control" name="city"value="{{ $students->city }}"/>
          </div>

          <div class="input-box">
          <label for="file">Photo</label>
            <input type="file" class="form-control" name="city"value="{{asset($students->student_image)}}"/>
          </div>
  
          </div>

        <div class="button">
          <input type="submit" value="Update Record">
        </div>
      </form>
    </div>
  </div>
@endsection
  
