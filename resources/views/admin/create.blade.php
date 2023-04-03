@extends('layouts.home-master')
@section('title')
Admin Register
@endsection
@section('content')
<style>
   .margin{
  margin-top: 50px;
  margin-bottom:50px
}

.background{
  background: linear-gradient(to bottom, #6CA6CD,  #D3D3D3);
  height: 100%;
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/member.form.css')}}">
<body class="background">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif

 <div class="margin">
    <h4 align="center">Admin</h4>
    <form method="POST" action="{{ route('admin.store') }}">
    @csrf
         <label for="name">Admin Name</label>
        <div class="field">
        <input type="text" class="form-control" name="name" id="name"/>       
        </div>

         <br>
        <label for="email">Email</label>
         <div class="field">
        <input type="text" class="form-control" name="email" id="email"/>       
        </div>
        <br>
        <label for="password">Password</label>
         <div class="field">
        <input type="password" class="form-control" name="password" id="password"/>       
        </div>

        <div class="content">
          <div class="checkbox">
        </div>

        <div></div>
        </div>

        <div class="field">
        <input type="submit" class="btn btn-block btn-danger"></input>
        </div>
      </form>
    </div>
</body>
@endsection
