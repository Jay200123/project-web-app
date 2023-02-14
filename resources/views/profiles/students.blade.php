@extends('layouts.master')
@section('content')
<body class="background">
<div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
  </div>     
@endif
<h3><strong>Welcome to MTICS Web App</strong></h3>
<div class="containers">
        <div class="col-md-8 col-md-offset-2">
        <h1><i class="fa fa-address-card" aria-hidden="true"></i>User Profile: {{Auth::user()->name}}</h1>
      @foreach($student as $student)
      <div class="avatar">
          <img src="{{ asset($student->student_image) }}">
          </div>
        <div class="container">
            <h3><b>Title:</b>{{$student->title}}</h3>
            <h3><b>First Name:</b>{{$student->fname}}</h3>
            <h3><b>Last Name:</b>{{$student->lname}}</h3>
            <h3><b>Phone:</b>{{$student->phone}}</h3>
            <h3><b>Address:</b>{{$student->address}}</h3>
            <h3><b>Town:</b>{{$student->town}}</h3>
            <h3><b>City:</b>{{$student->city}}</h3>
        </div>

        @endforeach
</div>
</body>

@endsection