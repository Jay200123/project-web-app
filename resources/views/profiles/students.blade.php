@extends('layouts.master')
@section('title')
Student Profile
@endsection
@section('content')
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="icon" href="{{asset('images/MTICS.png')}}" type = "image/x-icon"> 
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
<div class="container">
    <br />
    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br />
     @endif
  </div>
  
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


<div align="right">
<span class="image">
    <img src="/../images/MTICS1.png" width="500px">
</span>
</div>

<div class="wrapper">
  
    <div class="left" id="stud">
        <div class="stud">
        <img src="{{ asset($student->student_image) }}" alt="user">
        </div>
        <p>{{Auth::user()->role}}</p>
        <h3>{{$student->title}}. {{$student->fname}} {{$student->lname}}</h3>
        <BR>
         <p>Course & Section</p>
         <h4>{{$student->section}}</h4>
    </div>
    <div class="right">
        <div class="info">

            
            <h3>Student Info.</h3>
            
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    <p>{{Auth::user()->email}}</p>
                 </div> 
                 <div class="data">
                    <h4>Phone</h4>
                    <p>{{$student->phone}}</p>                
                </div> 
            </div>

        </div>

        <div class="social_media">
          
            <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('member.forms')}}" type="button" class="btn btn-success">Access Membership</a>
            </div>
            </div>
          </ul>
          <ul>
            <div class="row">
            <div class="col-sm-6 col-md-6">
            <a href="{{route('students.edit', $student->student_id)}}" type="button" class="btn btn-primary">Update  Record<Datag></Datag></a>
            </div>
            </div>
          </ul>
        </div>

        <br>
      
      <div class="projects">
            <h3>INFORMATION</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Address</h4>
                    <p>{{$student->address}}</p>
                 </div>
                 <div class="data">
                    <h4>Town</h4>
                    <p>{{$student->town}}</p>
                 </div>
                 <div class="data">
                   <h4>City</h4>
                    <p>{{$student->city}}</p>
              </div>
            </div>
        </div>

      
        
    </div>
</div>
<div class="margin">
<h3 style="text-align:center">My Orders</h3> 
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Orderinfo ID</td>
          <td>Date Placed</td>
          <td>Product Description</td>
          <td>Product Price</td>
          <td>Product Image</td>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
    @foreach($order->products as $product)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{$order->date_placed}}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td><img src="{{ asset($product->product_image)}}" width="80" height="80" alt="product.jpeg"></td>
        </tr>
    @endforeach
@endforeach
    </tbody>
  </table>
</div>
@endsection