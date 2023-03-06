@extends('layouts.officer_master')
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
      <form method="post" action="{{route('officers.update', $officer->student_id)}}" enctype ="multipart/form-data">

          <div class="form-group">
          @csrf 
              @method('PUT')
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" value="{{ $officer->title }}"/>
          </div>

          <div class="form-group">
              <label for="fname">First Name</label>
              <input type="text" class="form-control" name="fname" value="{{ $officer->fname }}"/>
          </div>

          <div class="form-group">
              <label for="lname">Last Name</label>
              <input type="text" class="form-control" name="lname" value="{{ $officer->lname }}"/>
          </div>

          <div class="form-group">
              <label for="section">Section</label>
              <input type="text" class="form-control" name="section" value="{{ $officer->section }}"/>
          </div>

          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="phone" value="{{ $officer->phone }}"/>
          </div>

          <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $officer->address }}"/>
          </div>

          <div class="form-group">
              <label for="town">Town</label>
              <input type="text" class="form-control" name="town" value="{{ $officer->town }}"/>
          </div>

          <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" value="{{ $officer->city }}"/>
          </div>

          <div class="form-group">
          <label for="image" class="control-label">Your Photo:</label>
          <input type="file" class="form-control" id="student_image" name="student_image" value="{{asset($officer->student_image)}}"/>
           @if($errors->has('student_image'))
           <small>{{ $errors->first('student_image') }}</small>
           @endif
          </div>

          <button type="submit" class="btn btn-block btn-danger">Update</button>
      </form>
  </div>
</div>
@endsection