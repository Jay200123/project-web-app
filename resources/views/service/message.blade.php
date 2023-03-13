@extends('layouts.master')
@section('content')
<style>
    .msg-container{
        margin-top: 50px;
        text-align:center;
        color:black;
    }

    .image{
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      }

      .img-icon{
        border-radius: 50%;
      }
      .background{
        background-color: #66ccff;
      }

</style>
<body class="background">
<div class="msg-container">
    <h3>Thank You for Using the MTICS Printing Services</h3>
    <h5>Please Check Your Email for Confirmation<i class="fa fa-envelope" aria-hidden="true"></i></h5>
    <div class="image">
        <img src="{{asset('images/mtics.jpg')}}" class="img-icon" height="150" width="160" alt="image.jpeg">
    </div>
    <br>
    <footer>@2023 Manila Technician Institute Computer Society TUP Taguig All rights reserved.</footer>
    <br>
    <button type="submit" class="btn btn-success"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i>Go Back to Home Page</a></button>
</div>
</body>
@endsection