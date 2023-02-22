@extends('layouts.master')
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
  <i class="fa fa-address-card" aria-hidden="true"></i> Update Student's Data
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
      <form method="post" action="#" enctype ="multipart/form-data">

          <div class="form-group">
          @csrf 
              @method('PUT')
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $students->title }}"/>
          </div>

          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ $students->fname }}"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ $students->lname }}"/>
          </div>

          <div class="form-group">
              <label for="section">Section</label>
              <input type="text" class="form-control" name="section" value="{{ $students->section }}"/>
          </div>

          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" value="{{ $students->phone }}"/>
          </div>

          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $students->address }}"/>
          </div>

          <div class="form-group">
              <label for="town">Town</label>
              <input type="text" class="form-control" name="town" value="{{ $students->town }}"/>
          </div>

          <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" value="{{ $students->city }}"/>
          </div>

          <div class="form-group">
          <label for="image" class="control-label">Your Photo:</label>
          <input type="file" class="form-control" id="id" name="customer_image" value="{{$students->student_image}}"/>
           @if($errors->has('student_image'))
           <small>{{ $errors->first('student_image') }}</small>
           @endif
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection